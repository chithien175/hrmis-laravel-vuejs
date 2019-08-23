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
        $secretKey = env('RECAPTCHA_V2_SECRET_KEY', '');
        $captcha = $request->get('g-recaptcha-response');

        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

        if(intval($responseKeys["success"]) !== 1) {
            return redirect()->back()->with('contact-form-success', 'Vui lòng check vào mẫu captcha!');
        }else{
            try {
                $contact = [];
                $contact['fullname'] = $request->get('fullname');
                $contact['email'] = $request->get('email');
                $contact['address'] = $request->get('address');
                $contact['phone'] = $request->get('phone');
                $contact['subject'] = $request->get('subject');
                $contact['msg'] = $request->get('msg');
    
                // $email_to = getFieldCompany('company.email');
                $email_to = 'chithien175@gmail.com';
                Mail::to( $email_to )->send(new ContactMail($contact));
                return redirect()->back()->with('contact-form-success', 'Gửi tin nhắn thành công! Cảm ơn bạn đã liên hệ chúng tôi!');
            } catch (Exception $ex) {
                info($ex->getMessage());
                return redirect()->back()->with('contact-form-success', 'Quá trình gửi mail lỗi!');
            }
        }
        
    }
}
