<?php

namespace App\Models\Frontend\Company\Jobs;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Company\Profile\CompanyProfile;

class JobPosts extends Model
{
    protected $table = 'job_posts';

    protected $fillable = [
        'job_title',
        'location_type',
        'location',
        'employment_type',
        'description',
        'required_skills',
        'responsibilities',
        'qualifications',
        'salary',
        'company_id',
    ];

    public function company() {
        return $this->belongsTo(CompanyProfile::class, 'company_id', 'company_id');
    }
}
