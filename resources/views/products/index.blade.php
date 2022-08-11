@extends('layouts.app')

@section('content')
<div class="product-page">
<h1>{{$product->title}}</h1>
<div>
    <div class="product-imgs"></div>
    <div class="product-sidebar">
        <p>Location: {{$product->location}}</p>
        <p>Verkoper: </p>
        <a href="/" >Contacteer verkoper </a>
    </div>
</div>
<div>
    <p>Category: {{$product->category}}</p>
    <p>{{$product->description}}</p>
</div>
</div>
@endsection