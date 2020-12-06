<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    public $timestamps = false;

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
    
    use HasFactory;
}
