<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
                    'name'  , 
                    'description'  , 
                    'price'  , 
                    'quantity'  , 
                    'unit_id'  , 
                    'manufacturer'  , 
                    'department_id'  , 
                    'category_id'  ,
                    'supplier_id' , 
                    'LastModifiedBy' , 
                    'low_stock_level'
    ];

    public function unit()
    {
        return $this->belongsTo(unit::class);
    }

    public function department()
    {
        return $this->belongsTo(department::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function consumption()
    {
        return $this->hasMany(Consumption::class);
    }

    public function replenishment()
    {
        return $this->hasMany(Replenishment::class);
    }

    // acessor
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('F d,Y');
    }
}
