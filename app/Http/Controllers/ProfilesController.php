<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($user) {
        $user = User::find($user);
        return view('profiles.index',['user' => $user]);
    }

    /*
    **
    ** Create Profile
    */

    public function create( $username ) {
        $this->authorize('create', $username->profile);
        return view('profiles.create', [ 'user' => $username ]);    
    }

    public function store( $username ) {
        
        $this->authorize('create', $username->profile);

        $data = request()->validate([
            'name' => 'required|max:255',
            'familyname' => 'nullable',
            'birthdate' => 'required',
            'gender' => 'required',
            'location' => 'required',
        ]);

        $username->profile->update( $data );
        session()->flash('alert-message', 'U bent succesvol geregistreerd.');
        session()->flash('alert-status', 'success');
        
        return redirect()->route('index');
    }

}
