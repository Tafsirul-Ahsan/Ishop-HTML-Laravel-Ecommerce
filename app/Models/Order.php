<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'uid', 'pid', 'quantity', 'subtotal', 'status', 'name', 'company', 'city', 'postal_code', 'prefecture', 'address','mobile','email','time_slot','cart_items','note','grandtotal',
    ];
}
