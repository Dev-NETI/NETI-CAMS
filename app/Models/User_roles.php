<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' , 
        'role_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function Roles()
    {
        return $this->belongsTo(Roles::class , 'role_id');
    }
}
