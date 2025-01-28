<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class TwelfthGradeEducation extends Model
{
    protected $table = 'candidates_education_twelfth_grade';

    protected $fillable = [
        'candidates_id',
        'college_name',
        'board_name',
        'grade_or_percentage',
        'year_of_passing',
        'passing_certificate'
    ];

    public function candidatesData() {
        return $this->belongsTo(User::class, 'candidates_id');
    }
}
