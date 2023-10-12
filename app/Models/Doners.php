<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doners extends Model
{
    use HasFactory;

    protected $table = 'doner';
    protected $guarded=[];
}
