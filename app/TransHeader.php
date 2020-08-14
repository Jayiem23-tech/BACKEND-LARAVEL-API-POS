<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransHeader extends Model
{
    protected $guarded = [];
    public function Transbodies(){
        return $this->hasMany("App\TransBody");
    }
}
