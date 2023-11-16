<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 
        'contact_person' , 
        'email' , 
        'phone' , 
        'address' , 
        'department_id' , 
        'Is_Deleted'
    ];

    public function department()
    {
        return $this->belongsTo(department::class);
    }

    public function suppliers()
    {
        return $this->hasMany(supplier::class);
    }

    public function product()
    {
        return $this->hasMany(product::class);
    }

}
