<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            Contact::create($request->except('_token'));
            return response()->json([
                'message' => 'Thanks for reaching out! Your message has been sent, and we\'ll respond as soon as possible.'
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
