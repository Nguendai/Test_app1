<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use DB;
use App\Http\Middleware\CheckAdmin;


class ProductControll extends Controller
{
   
    public function getList(){
    	$product=DB::table('product')->orderBy('id', 'desc')->paginate(3);
        $i=1;
        return view('admin.listProduct',['product'=>$product,'i'=>$i]);
    }
    public function getAdd(){
    	return view('admin.addProduct');
    }
    public function postAdd(Request $req){
    	$validate=Validator::make($req->all(),
    		[
         'nameproduct' => 'required|min:3|max:100',
         'description'=> 'required|min:3|max:300',
         'price'=> 'required|max:999999999'

         ],
         [
         'nameproduct.required'=>"Please,Enter name",
         'nameproduct.min'=>"Name must be greater than 3 char",
         'nameproduct.max'=>'Name must be less than 100 char',
         'description.required'=>'Please,Enter description',
         'description.min'=>'Description must be greater than 3 char',
         'description.max'=>'Description must be less than 300 char',
         'price.required'=>"Please,EnterPrice",
         'price.max'=>'Error'	,

         ]);
    	if($validate->fails()){
    		return redirect()->intended('admin/add')->withErrors($validate);
    	}
    	$image=null;
    	if($req->file('image')){
    		$image=$req->file('image');
    		$validate=Validator::make($req->all(),
    			[
                'image' =>'required|mimes:png,gif,jpg,jpeg|max:10240',
                ],
                [
                'image.required'=>'Please,Enter Image',
                'image.mimes'=>"Do not images",
                'image.max'=>'Max size is 10mb',
                ]);
    		if($validate->fails()){
    			return redirect()->intended('admin/add')->withErrors($validate);
    		}
           $path = 'upload/images';
           $fileName = time()."-".$image->getClientOriginalName();
           $image->move($path , $fileName); 
           $image = $fileName;

       }
       $product=new Product();
       $product->name=$req->nameproduct;
       $product->description=$req->description;
       $product->price=$req->price;
       $product->images=$image;
       $product->save();
       return redirect('admin/list')->with('success','Success');
    }
    public function getEdit($id){
        $product=Product::find($id);
        return view('admin.editProduct',['product'=>$product]);
    }
    public function postEdit(Request $req,$id){
        $product=Product::find($id);
        $validate=Validator::make($req->all(),
            [
            'nameproduct' => 'required|min:3|max:100',
             'description'=> 'required|min:3|max:300',
            ],
            [
            'nameproduct.required'=>"Please,Enter name",
            'nameproduct.min'=>"Name must be greater than 3 char",
            'nameproduct.max'=>'Name must be less than 100 char',
            'description.required'=>'Please,Enter description',
            'description.min'=>'Description must be greater than 3 char',
            'description.max'=>'Description must be less than 300 char',    
            ]);
        if($validate->fails()){
            return redirect()->intended('admin/edit/'.$id)->withErrors($validate);
        }
        $image=null;
        if($req->file('image')){
            $image=$req->file('image');
            $validate=Validator::make($req->all(),
                [
                'image' =>'required|mimes:jpg,png,gif,jpeg|max:10000',
                ],
                [
                'image.required'=>'Please,Enter Image',
                'image.mimes'=>"Do not images",
                'image.max'=>'Max size is 10mb',
                ]);
            if($validate->fails()){
                return redirect()->intended('admin/edit/'.$id)->withErrors($validate);
             }
            $path = 'upload/images';
            $fileName = time()."-".$image->getClientOriginalName();
            $filePath=$path.$req->images;
            if(file_exists($filePath)){
                unlink($filePath);
            }
            $image->move($path , $fileName); 
            $image = $fileName;
            $product->name=$req->nameproduct;
            $product->description=$req->description;
            $product->price=$req->price;
            $product->images=$image;
            $product->save();
        }else{
            $product->name=$req->nameproduct;
            $product->description=$req->description;
            $product->price=$req->price;
            // $product->images=$image;
            $product->save();
        }
        if($id !=false){
         return redirect('admin/list')->with('success','Success');
        }else{
         about(404);
        }   
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        // dd($product->images);  
        $filePath=public_path('upload/images/').$product->images;
        // dd($filePath);
        if(file_exists($filePath)){
            unlink($filePath);
        }
        $product->delete();
        return redirect('admin/list')->with('success','Delete Success');
    }
}
