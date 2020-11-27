<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $table="developers";

    //Mutator
    public function setEmailAttribute($value)
    {
        $this->attributes['email']=strtolower($value);
    }

    //Accessor
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getEmailAttribute($value)
    {
        return strtoupper($value);
    }
}
