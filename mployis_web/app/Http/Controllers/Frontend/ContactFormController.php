<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ContactForm;

class ContactFormController extends Controller
{
    public function handleContactForm(Request $request) {
        $request->merge(array_map('trim', $request->all()));
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000'
        ], [
            'name.required' => 'Please enter your name.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please provide a valid email address (e.g. example123@gmail.com).',

            'subject.required' => 'Please enter the subject.',
            'subject.max' => 'Subject must not exceed 255 characters.',

            'message.required' => 'Please enter your message',
            'message.max' => 'Message must not exceed 1000 characters.',
        ]);

        $contactForm = ContactForm::create($validatedData);


        if($contactForm) {
            $toEmail="manish.chavan113@gmail.com";
            $name=$contactForm->name
            $from=$contactForm->email
            $message=$contactForm->message;
            $subject=$contactForm->subject;
            Mail::to($toEmail)->send(new Email($name,$from,$message,$subject));

            return response()->json([
                'status' => true,
                'message' => 'Your message has been sent successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, Please try again later!',
            ]);
        }


    }
}
