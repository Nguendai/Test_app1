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
                    <h3>Detail Product</h3>
                </div>
                <div class="col-md-6">
                    <img src="images/3.jpg" alt="product" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2>Price:$800</h2>
                    <h2>Name:T-Shirt</h2>
                    <p>Description: nothing</p>
                    <button class="btn btn-primary">Buy</button>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
