<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   //this is used for mass assignment
   protected $fillable = ['name'];
}
