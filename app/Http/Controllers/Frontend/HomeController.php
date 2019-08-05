<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {
        $data = [];
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.home',$data);
    }

    public function post()
    {
        $data = [];
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.post',$data);
    }

    public function showRegistrationForm()
    {
        $data = [];
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.register',$data);
    }

    public function processRegistration(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'',
            'last_name'=>'',
           'email'=>'required|email',
           'password'=>'required|min:6',
            'photo'=>'image|max:10240',
        ]);

        $photo = $request->file('photo');
        $file_name =uniqid('photo_',true).time().'.'.$photo->getClientOriginalExtension();

        if ($photo->isValid()){
            $photo->storeAs('images',$file_name);
        }


        session()->flash('message','Registration Successful');
        return redirect()->back();
    }


}
