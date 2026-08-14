<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\PackageRequestMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        // Get form data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        try {
            // Send email
            Mail::to(config('mail.from.address'))->send(new ContactMail($data));

            return response()->json([
                'success' => true,
                'message' => $request->is('en/*') ? 'Your message has been sent successfully. Thank you!' : 'تم إرسال رسالتك بنجاح. شكراً لك!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $request->is('en/*') ? 'Sorry, something went wrong. Please try again later.' : 'عذراً، حدث خطأ ما. يرجى المحاولة مرة أخرى لاحقاً.'
            ]);
        }
    }

    public function sendPackageRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required|string|max:255',
            'package_category' => 'nullable|string|max:255',
            'selected_services' => 'nullable|string',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'entity' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'lang' => 'nullable|in:ar,en',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $lang = $request->input('lang', 'ar');
        $selectedServices = trim((string) $request->selected_services);
        $customNames = ['باقة مخصصة', 'Custom Package'];

        if (in_array($request->package_name, $customNames, true) && $selectedServices === '') {
            return response()->json([
                'success' => false,
                'message' => $lang === 'en'
                    ? 'Please select at least one service for the custom package.'
                    : 'الرجاء اختيار خدمة واحدة على الأقل للباقة المخصصة.'
            ]);
        }

        $data = [
            'package_name' => $request->package_name,
            'package_category' => $request->package_category,
            'selected_services' => $selectedServices,
            'name' => $request->name,
            'phone' => $request->phone,
            'entity' => $request->entity,
            'email' => $request->email,
            'message' => $request->message,
            'lang' => $lang,
        ];

        try {
            Mail::to(config('mail.from.address'))->send(new PackageRequestMail($data));

            return response()->json([
                'success' => true,
                'message' => $lang === 'en'
                    ? 'Your package request has been sent successfully. Thank you!'
                    : 'تم إرسال طلبك بنجاح. شكرًا لتواصلكم.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $lang === 'en'
                    ? 'Sorry, something went wrong. Please try again later.'
                    : 'نعتذر، حدث خطأ غير متوقع. الرجاء المحاولة لاحقًا.'
            ]);
        }
    }
}
