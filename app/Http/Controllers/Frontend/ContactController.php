<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function postContactForm(Request $request)
    {
        try {
            $contact = [];
            $contact['fullname'] = $request->get('fullname');
            $contact['email'] = $request->get('email');
            $contact['address'] = $request->get('address');
            $contact['phone'] = $request->get('phone');
            $contact['subject'] = $request->get('subject');
            $contact['msg'] = $request->get('msg');
            Mail::to('chithien175@gmail.com')->send(new ContactMail($contact));
            return redirect()->back()->with('contact-form-success', 'Gửi tin nhắn thành công! Cảm ơn bạn đã liên hệ chúng tôi!');
        } catch (Exception $ex) {
            info($ex->getMessage());
            return redirect()->back()->with('contact-form-success', 'Quá trình gửi mail lỗi!');
        }
    }
}
