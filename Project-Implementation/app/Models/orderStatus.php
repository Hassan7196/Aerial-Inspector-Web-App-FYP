<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class orderStatus extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[
      'Status',
    ];

    public  function orderDetails(){
        return $this->belongsToMany(orderDetail::class);
    }


}
