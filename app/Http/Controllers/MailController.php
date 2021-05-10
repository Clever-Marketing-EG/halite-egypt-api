<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

   public function contactUs(Request $request) {
       $data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'subject' => 'required|string|min:3',
            'message' => 'required|string|min:3'
       ]);
       Mail::to(MAIL_RECIEVER)->send(new ContactMail($data));
       return $this->jsonResponse(trans('utils.contact-us-thanks'));

   }
}
