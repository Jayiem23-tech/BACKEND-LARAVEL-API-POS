<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
class TransBody extends Model
{
    protected $guarded = [];
    public function TransHeader(){
        return $this->belongsTo("App\TransHeader");
    }
}
