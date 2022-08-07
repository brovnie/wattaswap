@extends('layouts.app')

@section('content')
<div class="create-profile">
<form method="post" action='/profiles/{{$user->username}}/create' class=" border-xl auth-card card-shadow">
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
        test
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
    <div class="mt-5">
        <label for="gender">{{__('Geslacht')}}</label>
        <select id="gender" name="gender">
            <option value="m">{{__('Man')}}</option>
            <option value="v">{{__('Vrouw')}}</option>
            <option value="x">{{__('Andere')}}</option>
        </select>
    </div>  
  
    <div class="mt-5"> 
        <label for="location">{{__('Locatie')}}</label>
        <select id="location" name="location">
            <option disabled value="">Kies een stad</option>
            <option value="Mechelen">{{__('Mechelen')}}</option>
            <option value="Aalst">{{__('Aalst')}}</option>
        </select>
    </div>
 

    <button type="submit" name="over" class="mt-5 btn btn--inline btn--orange w-auto ">{{__('Volgende')}}</button>
</form>
</div>
</div>
@endsection