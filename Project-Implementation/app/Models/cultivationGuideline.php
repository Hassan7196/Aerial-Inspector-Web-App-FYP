<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cultivationGuideline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'heading',
        'description',
    ];

}
