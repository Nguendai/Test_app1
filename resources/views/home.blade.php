@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       @include('layouts.info')
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
                            {{str_limit($pd->description, $limit = 30, $end = '...')}}
                        </div>
                        <div class="price">
                            <span class="price-new">${{$pd->price}}</span>
                        </div>
                        <div class="cart-button button-group">
                         <a href="detail/{{$pd->id}}" class="btn-btn-default">Show Detail </a>
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
