<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 
        'description' , 
        'Is_Deleted'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function product()
    {
        return $this->hasMany(product::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
