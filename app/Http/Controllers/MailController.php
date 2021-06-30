<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\ProductMail;

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

       Mail::to(MAIL_RECEIVER)->send(new ContactMail($data));
       return $this->jsonResponse(trans('utils.contact-us-thanks'));

   }

   public function product(Request $request) {
    $data = $request->validate([
         'name' => 'required|string|min:3',
         'email' => 'required|email',
         'phone' => 'required|numeric',
         'address' => 'required|string|min:3',
         'website' => 'required|url',
         'quantity' => 'required|numeric',
         'packing' => 'required|string|min:3',
         'port' => 'string|min:3',
         'question' => 'string|min:3'
    ]);
    Mail::to(MAIL_RECEIVER)->send(new ProductMail($data));
    return $this->jsonResponse(trans('utils.contact-us-thanks'));

}
}
