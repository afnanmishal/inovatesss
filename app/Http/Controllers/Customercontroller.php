<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Customercontroller extends Controller
{
    public function customerreg(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
                // 'g-recaptcha-response' => 'required|captcha'

            ]);
        User::insert([

            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => 'Customer',
            "phone_number" => $request->phone_number,
            "created_at"=>Carbon::Now(),
        ]);
        return back()->with('customerreg', 'Your Account As A Customer
         Created Succesfully ');
    }
    public function customerlogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            return Redirect('home');
        }
         else {
            // Authentication failed
            return back()->with('error', 'Invalid credentials');
        }
    }

}
