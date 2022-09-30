<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suppliers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'phone', 'company', 'address', 'product', 'comment'];

    protected $dates = ['delete_at'];
}
