<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasutijumi extends Model
{
    protected $fillable = ['name','client','info','price'];
}
