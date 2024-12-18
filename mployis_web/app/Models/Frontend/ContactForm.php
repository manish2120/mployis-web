<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactForm extends Model
{
    use HasFactory;
    
    protected $table = 'contact_form';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
