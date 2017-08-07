<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = "administrators";

    protected $fillable = ['name', 'status', 'email'];
}
