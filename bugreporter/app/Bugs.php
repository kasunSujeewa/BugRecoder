<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bugs extends Model
{
    protected $fillable = ['title', 'status', 'description'];
}
