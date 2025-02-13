<?php

namespace App\Models\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Models\Frontend\Profile\HigherEducation;
use App\Models\Frontend\Profile\CandidateEducation;
use App\Models\Frontend\Profile\PersonalInformation;
use App\Models\Frontend\Profile\TenthGradeEducation;
use App\Models\Frontend\Profile\CandidateInformation;
use App\Models\Frontend\Profile\ExperienceInformation;
use App\Models\Frontend\Profile\PostGraduateEducation;
use App\Models\Frontend\Profile\TwelfthGradeEducation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type',
        'fname',
        'lname',
        'name',
        'email',
        'password',
        'phone_no',
        'toc'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function candidateInformation() {
        return $this->hasOne(CandidateInformation::class);
    }

    public function candidatePersonalInfo() {
        return $this->hasOne(PersonalInformation::class);
    }

    public function candidateEducation() {
        return $this->hasOne(CandidateEducation::class);
    }
   
    public function candidateExperienceInfo() {
        return $this->hasOne(ExperienceInformation::class);
    }

}
