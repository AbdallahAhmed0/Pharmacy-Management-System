<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product', 'category_id', 'supplier_id',
        'cost_price', 'quantity', 'expiry_date',
        'image'
    ];
}
