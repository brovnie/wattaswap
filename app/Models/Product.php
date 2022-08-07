<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded =[];
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'sold',
    ];

    /**
    * Connect with Profile
    */
    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
