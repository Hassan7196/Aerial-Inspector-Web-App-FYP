<?php

namespace App\Models;

use App\Http\Controllers\sprayInformationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sprayInformation;

class admin extends Model
{
    use HasFactory;

    protected $fillable = [
      'password',
      'firstname',
      'lastname',
      'phone'
    ];

    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function alerts(){

        return $this->hasMany('App\Models\Alert');
    }

  public function sprayInformations(){

        return $this->hasMany(sprayInformation::class);
  }
    public function cultivationGuidelines(){
        return $this->hasMany(cultivationGuideline::class);
    }
  public function drones(){

        return $this->hasMany(drone::class);
  }
}
