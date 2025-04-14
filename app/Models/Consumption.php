<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'purpose',
        'DataModifier',
        'created_at'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    // ACESSOR
    public function getDateExecutedAttribute()
    {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }
}
