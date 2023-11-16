<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function User_roles()
    {
        return $this->hasMany(User_roles::class , 'role_id');
    }
}
