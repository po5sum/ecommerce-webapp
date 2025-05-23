<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'payment_type',
        'total',
    ];

    public function items(){
    return $this->hasMany(\App\Models\OrderItem::class);
    }

}
