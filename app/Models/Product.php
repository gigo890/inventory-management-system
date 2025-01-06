<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
