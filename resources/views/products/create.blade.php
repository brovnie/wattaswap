@extends('layouts.app')

@section('content')
<form method="post" action="/products/create" enctype="multipart/form-data" class=" border-xl auth-card card-shadow">
@csrf  
<div>
        <input 
            type="text" 
            name="title" 
            id="title" 
            placeholder="{{__('Product title')}}"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} mt-3"
            autofocus>
    </div>
    <div>
        <textarea name="description" id="description" rows=10></textarea>
    </div>
    <div>
        <input 
            type="number" 
            name="price" 
            id="price" 
            placeholder="{{__('Price')}}"
            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} mt-3"
            autofocus>
    </div>
    <div>
        <!--
    <label for="files" class="form-label mt-4">Product fotos</label>
                <input 
                    type="file" 
                    name="images[]"
                    class="form-control" 
                    accept="image/*"
                    multiple
                >
    </div>-->
    <upload-media 
          server='/api/upload'
          error="@error('media'){{$message}}@enderror">
        </upload-media>
    <div>
        <select id="category_id" name="category_id" class="category">
            @foreach(\App\Models\Category::all() as $category)
                <option name="{{$category->id }}" value="{{ $category->id }}" >{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
   <div>
    <input-location></input-location>
   </div> 
        <button type="submit" name="over" class="mt-5 btn btn--inline btn--orange w-auto ">{{__('Product toevoegen')}}</button>
</form>
@endsection