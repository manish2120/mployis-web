<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = 'candidates_personal_info';

    protected $fillable = [
        'candidates_id',
        'religion',
        'caste',
        'pancard_no',
        'aadhar_card_no',
        'passport',
        'passport_no',
    ];

    public function candidatesData() {
        return $this->belongsTo(User::class, 'candidates_id');
    }
}
