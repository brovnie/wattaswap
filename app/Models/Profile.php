<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'familyname',
        'birthdate',
        'gender',
        'location',
        'profil_image',
    ];

    /**
    * Connect with User
    */
    public function user(){
        return $this->belongsTo(User::class);
    }
        
    /**
    * Get username
    */
    public function getUsername()
    {
        return $this->user()->get()[0]->username;
    }

}
