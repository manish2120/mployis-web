<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
  protected $table =  'candidates_education';

  protected $fillable = [
    'candidates_id',
    'education_level_id',
    'school_or_college',
    'board_name',
    'grade_or_percentage',
    'year_of_passing',
    'passing_certificate',
  ];

  public function candidatesData() {
    return $this->belongsTo(User::class, 'candidates_id');
  }

  public function educationLevel() {
    return $this->belongsTo(User::class, 'education_level');
  }
}
