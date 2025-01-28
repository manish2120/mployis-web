<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class ExperienceInformation extends Model
{
    protected $table = 'candidates_work_experience';

    public $timestamps = true;

    protected $fillable = [
        'candidates_id',
        'job_title',
        'employee_type',
        'company_name',
        'location_type',
        'start_date',
        'end_date',
        'is_currently_working'
    ];

    public function candidatesData() {
       return $this->belongsTo(User::class, 'candidates_id');
    }
}
