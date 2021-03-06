<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        return view('home',['product'=>$product]);
    }
    public function showDetail($id){
        $product=Product::find($id);
        return view('detail',['product'=>$product]);
    }
}
