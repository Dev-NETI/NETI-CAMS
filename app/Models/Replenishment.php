<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replenishment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'description',
        'DataModifier',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    //ASSESSOR
    public function getDateExecutedAttribute()
    {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }
}
