<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

    public function store( $username, Request $request ) {
        
        $this->authorize('create', $username->profile);

        $data = request()->validate([
            'profil_image' => 'nullable',
            'name' => 'required|max:255',
            'familyname' => 'nullable',
            'birthdate' => 'required',
            'gender' => 'required',
            'location' => 'required',
        ]);

        if (request('profil_image')) {
            $imagePath = $request->file('profil_image')->store('profiles','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
            $image->save();

            $imageArray = ['profil_image' => $imagePath];
        }

        $disableCreate = array('new_user' => 0);

        $username->profile->update(array_merge(
            $data,
            $imageArray ?? [],
            $disableCreate
        ));
        
        
        session()->flash('alert-message', 'U bent succesvol geregistreerd.');
        session()->flash('alert-status', 'success');
        


        return redirect()->route('index');
    }

}
