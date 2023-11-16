<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replenishment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id' , 
        'quantity' , 
        'description' , 
        'DataModifier'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
