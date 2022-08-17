@extends('layouts.app')

@section('content')
<form method="post" action="/products/{{$product->id}}" enctype="multipart/form-data" class=" border-xl auth-card card-shadow">
@csrf  
        @method('PATCH')  
<div>
        <input 
            type="text" 
            name="title" 
            id="title" 
            placeholder="{{__('Product title')}}"
            value="{{$product->title}}"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} mt-3"
            autofocus>
    </div>
    <p> {{$product->location}}</p>
    <div>
        <textarea name="description" id="description" rows=10 value="{{$product->description}}">{{$product->description}}</textarea>
    </div>
    <div>
        <input 
            type="number" 
            name="price" 
            id="price" 
            value="{{$product->price}}"
            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} mt-3"
            autofocus>
    </div>
 
    <div>
        <update-images
            server='/api/upload'
            error="@error('media'){{$message}}@enderror"
            media_file_path='/storage/product_images'
            media_server="/api/media/{{$product->id}}" 
            error="@error('media'){{$message}}@enderror"
            >
        </update-images>
    <div>
        
    <p>Category: {{$product->category->category_name}}
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 15px; height: 15px;" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
        </span>
    </p>

        <select id="category_id" name="category_id" class="category">
            @foreach(\App\Models\Category::all() as $cat)
                <option name="{{$cat->id }}" value="{{ $cat->id }}" >{{ $cat->category_name }}</option>
            @endforeach
        </select>
    </div>
   <div>
    <p>Location: {{$product->location}}
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
        </span>
    </p>
    <input-location></input-location>
   </div> 
        <button type="submit" name="over" class="mt-5 btn btn--inline btn--orange w-auto ">{{__('Product toevoegen')}}</button>
</form>
@endsection