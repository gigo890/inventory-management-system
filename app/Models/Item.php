<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Product;
use App\Models\OrderedItem;
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
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function orderedItem(){
        return $this->hasMany(OrderedItem::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
