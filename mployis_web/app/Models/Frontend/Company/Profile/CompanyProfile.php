<?php

namespace App\Models\Frontend\Company\Profile;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Company\Jobs\JobPosts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // imported Authenticatable to 

class CompanyProfile extends Authenticatable
{
    use HasFactory;

    protected $table = 'company_profile';
    protected $fillable = [
        'id',
        'logo',
        'company_name',
        'designated_hr',
        'email',
        'phone_no',
        'industry_type',
        'country',
        'state',
        'city',
        'pincode',
        'address',
        'company_id',
        'website',
        'description',
    ];

    public function jobPosts() {
        return $this->hasMany(JobPosts::class, 'company_id', 'company_id');
    }
}
