<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id' , 'quantity' , 'purpose' , 'DataModifier'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
