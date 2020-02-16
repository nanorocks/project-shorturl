<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['path', 'link'];
}