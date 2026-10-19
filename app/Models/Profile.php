<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'name', 'company', 'email', 'mobile', 'prefecture', 'city', 'postal_code', 'address', 'img' 
    ];
}
