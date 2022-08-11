@extends('layouts.app')

@section('content')
<div class="search-results">
    <div class="product-grid">
    @foreach($requestedProducts as $product)
    <div class="product-item">
        <div class="product-image">
            <div class="img-wrapper">
          
            </div> 
        </div>
    <p>{{$product->title}}</p>

    <p>{{$product->price}}<p>
        <p>Bekijk product</p>
        <a href="/products/{{$product->id}}">Meer</a>
    </div>

@endforeach
    </div>

</div>
@endsection