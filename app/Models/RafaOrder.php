<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RafaOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['delivery_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
