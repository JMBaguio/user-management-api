<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserVerificationService;

class UserVerificationController extends Controller
{
    protected $service;

    public function __construct(UserVerificationService $service)
    {
        $this->service = $service;
    }

    public function showForm()
    {
        return view('user.verify');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'verification_document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $this->service->submit($user, $request->file('verification_document'));

        return redirect()->back()->with('success', 'Document submitted for verification.');
    }
}
