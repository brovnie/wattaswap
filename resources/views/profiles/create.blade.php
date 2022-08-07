@extends('layouts.app')

@section('content')
<div class="create-profile">
<form method="post" action="/profiles/{{$user->username}}/create" enctype="multipart/form-data" class=" border-xl auth-card card-shadow">
        @csrf
        @method('PATCH')
        <div class="card-header font-proximanova text-center">{{ __('Over jou') }}</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="mt-5">
        <profil-image></profil-image>
        <label class="text-bold" for="name">{{__('Voornaam')}}</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            placeholder="{{__('Voornaam')}}"  
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            autofocus>
            <label class="text-bold" for="familyname">{{__('Achternaam')}}</label>
        <input 
            type="text" 
            name="familyname" 
            id="familyname" 
            placeholder="{{__('Achternaam')}}"
            class="form-control{{ $errors->has('familyname') ? ' is-invalid' : '' }} mt-3"
            autofocus>
    </div>   
    <div class="my-5">
        <label for="birthdate">{{__('Gebortedatum')}}</label>
        <input 
            type="date" 
            name="birthdate" 
            id="birthdate"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
    </div>
    <p>{{__('Geslacht')}}<p>
    <div>
        <div>
            <label for="man">{{__('Man')}}</label>
            <input type="radio" name="gender" id="man" value="m">
        </div>
        <div>
            <label for="vrouw">{{__('Vrouw')}}</label>
            <input type="radio" name="gender" id="vrouw" value="m">
        </div>
        <div>
            <label for="andere">{{__('Andere')}}</label>
            <input type="radio" name="gender" id="andere" value="m">
        </div>
    </div>
    <input-location></input-location>
    <button type="submit" name="over" class="mt-5 btn btn--inline btn--orange w-auto ">{{__('Inschrijven')}}</button>
</form>
</div>
</div>
@endsection