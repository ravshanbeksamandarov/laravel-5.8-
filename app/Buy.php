<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
     public $table = 'buys';

     public $fillable = [
         'name', 'money', 'image', 'thumb'
     ];
}
