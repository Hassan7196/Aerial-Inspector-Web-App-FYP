<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sprayInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cropName',
           'diseaseName',
            'sprayDescription',
            ];

    public $timestamps = false;
}
