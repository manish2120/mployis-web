<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class TenthGradeEducation extends Model
{
  protected $table =  'candidates_education_tenth_grade';

  protected $fillable = [
    'candidates_id',
    'school_name',
    'board_name',
    'grade_or_percentage',
    'year_of_passing',
    'passing_certificate'
  ];

  public function candidatesData() {
    return $this->belongsTo(User::class, 'candidates_id');
  }
}
