<?php

namespace App\Models\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateInformation extends Model
{
    use HasFactory;

    protected $table = 'candidates_information';
    public $timestamps = true;

    protected $fillable = [
        'candidates_id',
        'profile_picture',
        'fname',
        'lname',
        'email',
        'gender',
        'country',
        'state',
        'district',
        'phone_no',
        'pincode',
        'address',
        'date_of_birth'
    ];

    public function candidatesData() {
        return $this->belongsTo(User::class);
    }
}
