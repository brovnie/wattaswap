@extends('layouts.app')

@section('content')
<form method="post" action="/products/create" enctype="multipart/form-data" class=" border-xl auth-card card-shadow">
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
        <button type="submit" name="over" class="mt-5 btn btn--inline btn--orange w-auto ">{{__('Product toevoegen')}}</button>
</form>
@endsection