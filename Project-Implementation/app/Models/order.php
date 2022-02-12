<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function orderDetails(){

        return $this->hasMany(orderDetail::class);
    }
    public function customer(){
        return $this->belongsTo(customer::class);
    }
}
