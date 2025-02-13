<?php

namespace App\Models\Frontend\Auth\Company;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Company\Jobs\JobPosts;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Authenticatable
{
    use HasFactory;

    // protected $table = ''
    
    protected $fillable = ['name', 'phone_no', 'email', 'password', 'toc'];

    public function companyJobs() {
        return $this->hasMany(JobPosts::class);
    }
}
