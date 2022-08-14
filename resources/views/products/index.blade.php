@extends('layouts.app')

@section('content')
<div class="product-page">
<h1>{{$product->title}}</h1>
<div>
    <div class="product-imgs">
       @foreach($product_imgs as $img)
        <div class="product-img">
            <img class="img" src="/storage/product_images/{{$img->name}}" alt="profile picture">
        </div>    
       @endforeach
        {{$product->id}}    
    </div>
    <div class="product-sidebar">
        <p>Location: {{$product->location}}</p>
        <p>Verkoper: 
        <img class="img" src="/storage/{{$product->profile->profil_image}}" alt="profile picture">    
        <a href="/users/{{$product->profile->user->username}}"> {{$product->profile->user->username}} </a></p>
        <a href="/" >Contacteer verkoper </a>
    </div>
</div>
<div>
    <p>Category: {{$product->category->category_name}}</p>
    <p>{{$product->description}}</p>
</div>
</div>
@endsection