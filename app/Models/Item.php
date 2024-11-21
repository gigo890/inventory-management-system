<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    // attributes that are not mass assignable
    protected $guarded = [];

    use HasFactory;
}
