<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RafaOrder extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'phone' , 'details' , 'total_price' , 'delivery_date'];
}
