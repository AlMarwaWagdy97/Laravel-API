<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories'; 
    protected $fillable =['name_Ar', 'name_Eng', 'Active', ];
}
