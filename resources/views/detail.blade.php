@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @include('layouts.info')
    <div class="col-md-9" >
        <div class="row">
            <div class="col-md-12 top">
                <h3>Detail Product</h3>
            </div>
            <div class="col-md-6">
                <img src="upload/images/{{$product->images}}" alt="product" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2>Price:$ {{$product->price}}</h2>
                <h2>Name:{{$product->name}}</h2>
                <p>Description: {{$product->description}}</p>

            </div>
        </div>
    </div>
</div>

</div>
@endsection
