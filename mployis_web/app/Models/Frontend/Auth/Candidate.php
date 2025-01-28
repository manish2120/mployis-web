<?php

namespace App\Models\Frontend\Auth;

use App\Models\Frontend\Profile\PersonalInformation;

use App\Models\CandidateInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // imported Authenticatable to 

class Candidate extends Authenticatable // Extend Authenticatable (User)
{
    use HasFactory;

    protected $table = 'candidates_data';
    public $timestamps = true;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'toc'
    ];

    public function candidateInformation() {
        return $this->hasOne(CandidateInformation::class);
    }

    public function candidatePersonalInfo() {
        return $this->hasOne(PersonalInformation::class);
    }
}