<?php

namespace App\Models\Frontend\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = ['name', 'phone_no', 'email', 'password', 'toc'];
}
