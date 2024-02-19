<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
   public function submit(Request $request){
    $request->validate([
        'email' => 'required|email',
    ]);
    $email = $request->input('email');
}
}
