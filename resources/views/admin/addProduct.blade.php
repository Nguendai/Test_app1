@extends("layouts.app")
@section("content")
<div class="main">
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Add</small>
                    </h1>
                </div>
                 <div class="col-lg-7">
                  @include('errors.logErrors')
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="nameproduct" required placeholder="Please Enter Name"  value="{{old('nameproduct')}}" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="price" min="10" max="999999999"  value="{{old('price')}}" required placeholder="Please Enter Price" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file"  name="image" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" value="{{old('description')}}" name="description" rows="3"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-default">Product Add</button>
                            <a href="{{url('admin/list')}}" class="btn btn-default">Cancel</a>
                        <form>
                    </div>
                      
            </div>
        </div>
</div>
@endsection