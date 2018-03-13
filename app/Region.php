<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function districts()
    {
      return $this->hasMany('App\District');
    }
    public function healthSubDistricts()
    {
      return $this->hasManyThrough('App\HealthSubDistrict','App\District');
    }
    public function healthFacilities()
    {
      # code...
      return $this->hasManyThrough('App\HealthFacility','App\HealthSubDistrict');
    }
}
