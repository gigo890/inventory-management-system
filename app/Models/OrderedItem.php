<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    protected $guarded =[];

    use HasFactory;
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
}
