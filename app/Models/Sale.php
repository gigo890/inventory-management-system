<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
