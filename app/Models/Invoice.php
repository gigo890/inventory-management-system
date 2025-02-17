<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}
