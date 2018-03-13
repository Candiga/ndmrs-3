<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function healthFacility()
    {
      # code...
      return $this->belongsTo('App\HealthFacility');
    }
}
