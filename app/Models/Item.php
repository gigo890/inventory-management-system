<?php

namespace App\Models;

use Database\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    // attributes that are not mass assignable
    protected $guarded = [];

    use HasFactory;

    protected static function newFactory()
    {
        return ItemFactory::new();
    }
}
