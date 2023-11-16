<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
            'name' , 
            'description' , 
            'department_id' , 
            'Is_Deleted'
    ];

    public function department()
    {
        return $this->belongsTo(department::class);
    }

    public function product()
    {
        return $this->hasMany(product::class);
    }

}
