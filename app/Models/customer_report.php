<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_report extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cutomer_report';
    protected $primaryKey = 'sale_id';
    protected $fillable = ['prodects_id'];
}
