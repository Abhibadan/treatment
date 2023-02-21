<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_signup extends Controller
{
    //patient get form
    public function patient_signup()
    {
        return view('patient_signup');
    }
    //patient submiting form
    public function patient_register(Request $request){
        $request->validate(
            [
                'name'=>'required|min:6|max:50',
                'mno'=>'required|min:10|max:10',
                'email'=>'required|email',
                'gender'=>'required',
                'password'=>'required|confirmed|min:8|max:16',
                'password_confirmation'=>'required|min:8|max:16'
            ]
        );
        
    }
    public function doctor_signup(){
        return view('doctor_signup');
    }
    
    // public function doctor_register(Request $request){
    //     $request->validate(
    //         [
    //             'name'=>'required|min:6|max:50',
    //             'mno'=>'required|min:10|max:10',
    //             'email'=>'required|email',
    //             'gender'=>'required',
    //             'degree'=>'required',
    //             'specialist'=>'required',
    //             'licence'=>'required',
    //             'licence_image'=>'required',
    //             'password'=>'required|confirmed|min:8|max:16',
    //             'password_confirmation'=>'required|min:8|max:16'
    //         ]
    //         )
    // }
}