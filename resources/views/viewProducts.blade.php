@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
            <br><br>
            <h3>All Products</h3>
            <div class="row">
                @foreach($products as $product)    
                    <div class="col-sm-4"> 
                        <div class="card" >
                        <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" class="card-img-top img-fluid" style='max-height: 300px' style="item-align:center;"></a>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align:center;">{{$product->name}}</h5>
                            <p class="card-text" style="text-align:center;">{{$product->description}}</p>
                            <br>
                            <div class="card-text" style="text-align:center;">Price: RM{{$product->price}} </div>
                            <div class="col text-center">
                             <button style="float:center" class="btn btn-danger btn-xs">Add to Cart</button>
                        </div>
                    </div>
            </div>
        </div>
           @endforeach  
        </div>
        <br><br>
    </div>
           <div class="col-sm-2"></div>
</div>
@endsection    