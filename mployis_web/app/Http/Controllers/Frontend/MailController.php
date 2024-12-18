<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail() {
        $toEmail="manish.chavan113@gmail.com";
        $message="Test";
        $subject="Testing smpt";
        Mail::to($toEmail)->send(new Email($message,$subject));
    }

}
