<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class PostGraduateEducation extends Model
{
    protected $table = 'candidates_education_postgraduate';

    protected $fillable = [
        'candidates_id',
        'institute_or_college_name',
        'board_name',
        'grade_or_percentage',
        'year_of_passing',
        'passing_certificate'
    ];

    public function candidatesData() {
        return $this->belongsTo(User::class, 'candidates_id');
    }
}
