<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    public function product() {
        return $this->hasOne('App\Models\Product', 'foreign_key');
    }
    
    use HasFactory;
}
