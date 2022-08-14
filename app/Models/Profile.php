<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Location\Facades\Location;

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
    public function products(){
        return $this->hasMany(Product::class);
    }
    /**
    * 
    * Custom methods
    */

    public function getUsername()
    {
        return $this->user()->get()[0]->username;
    }
    
    public function getCategory() {
        return $this->category()->get()->category_name;
    }
}
