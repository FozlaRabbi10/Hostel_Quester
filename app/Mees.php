<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mees extends Model
{
    protected $fillable = ["user_id","name","photo","address","contact_number","latitude","longitude","features"];

    public function owner()
    {
        return $this -> belongsTo(User :: class,'user_id');
    }
}
