@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="khoia col-md-3"">
            <div class="col-md-12 top">
                <h3>Imformation</h3>
            </div>
            <img src="upload/images/abc.jpg" width="40%" alt="product" class="img-circle">
            <div class="info">
                <p>Name:<i>Nguyen Van Dai</i></p>
                <p>Email:<i>dainv320@gmail.com</i></p>
            </div>
            
        </div>
        <div class="col-md-9" >
            <div class="row">
                <div class="col-md-12 top">
                    <h3>List Product</h3>
                </div>
                @foreach($product as $pd)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="image">
                            <img src="upload/images/{{$pd->images}}"  alt="product" class="img-responsive">
                        </div>
                        <div class="caption text-align-center">
                            <h4><a href="detail/{{$pd->id}}">{{$pd->name}}</a></h4>
                            <div class="description">
                                {{$pd->description}}
                            </div>
                            <div class="price">
                                <span class="price-new">${{$pd->price}}</span>
                            </div>
                            <div class="cart-button button-group">
                                <button type="button" class="btn btn-cart">
                                    Add to cart
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    
</div>
@endsection
