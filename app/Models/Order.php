<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\OrderedItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function orderedItems(){
        return $this->hasMany(OrderedItem::class);
    }
    public function sale(){
        return $this->hasOne(Sale::class);
    }
}
