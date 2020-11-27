<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("register");
    }

    public function registeForm(Request $request)
    {
        return back()->with('authregiter_submitted','Form Submitted successfully!');
    }
}
