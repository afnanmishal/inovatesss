<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    //  main profile page controller
    public function profile()
    {
        return view("layouts.dashboard.profile.index");
    }

    //  main profile page controller

    //  main profile_photo_upload  controller
    public function profile_photo_upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        $new_name = Auth::user()->id . "." . $request->file('profile_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('profile_photo'))->resize(300, 300);
        $img->save(base_path('public/uploads/profile_photo/' . $new_name), 80);


        User::find(auth()->id())->update(['profile_photo' => $new_name]);
        return back();
    }
    //  main profile_photo_upload  controller



    //  main cover_photo_upload  controller
    public function cover_photo_upload(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|mimes:png,jpg',
        ]);
        $new_name = Auth::user()->id . "." . $request->file('cover_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('cover_photo'))->resize(1600, 451);
        $img->save(base_path('public/uploads/cover_photo/' . $new_name), 80);


        User::find(auth()->id())->update(['cover_photo' => $new_name]);
        return back();
    }
    //  main cover_photo_upload  controller



    //  main password_change  controller

    public function password_change(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(auth()->id())->update([
                "password" => bcrypt($request->password)
            ]);
            return back();
        } else {
            echo "DB Hasun er Songge Password Milche Na";
        }
    }
    //  main password_change  controller


    //  main phone_number_verify  controller
    public function phone_number_varify()
    {


        $random =rand(100,200);
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "f3Dzx16IAEKP5Qt6Z9X7";
        $senderid = "f3Dzx16IAEKP5Qt6Z9X7";
        $number = auth()->user()->phone_number;
        $message = "Dear Guardian, your child Amena Samsaad Shifa ,Roll:43.Damaged Our School property you have to attend the school to meet with academic incharge Parvez Kawser";
        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);


        Verification::insert([
            'user_id'=>auth()->user()->id,
            'phone_number'=>$number,
            'code'=>$random,
        ]);


    }

    //  main phone_number_verify  controller

}
