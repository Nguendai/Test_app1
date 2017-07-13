@extends("layouts.app")
@section("content")
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$product->name}}
                    <small>Edit</small>
                </h1>
            </div>
            <div class="col-lg-7">
              @include('errors.logErrors')
              <form action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="nameproduct" required value="{{$product->name}}" placeholder="Please Enter Name" />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" name="price"  value="{{$product->price}}" min="10" max="999999999"  required placeholder="Please Enter Price" />
                </div>
                <div class="form-group">
                    @if($product->images != null)
                    <img src="upload/images/{{$product->images}}" alt="">
                    @endif
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="image" >
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control"  name="description" rows="3">{{$product->description}}</textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Product Add</button>
                <button type="reset" class="btn btn-default">Delete</button>
                <form>
                </div>
                
            </div>
        </div>
    </div>
    @endsection