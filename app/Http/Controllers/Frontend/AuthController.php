<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
        return view('frontend.register', $data);
    }

    public function processRegistration(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'photo' => 'required|image|max:10240',
        ]);

    $photo = $request->file('photo');
    $file_name = uniqid('photo_', true) . time() . '.' . $photo->getClientOriginalExtension();

    if ($photo->isValid()) {
        $photo->storeAs('images', $file_name);
    }


    $data = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'username' => strtolower(trim($request->input('username'))),
        'email' => strtolower($request->input('email')),
        'password' => bcrypt($request->input('password')),
        'photo' => $file_name,

    ];


        try {
            User::create($data);

            session()->flash('message', 'Registration Successful');
            session()->flash('type', 'success');

            return redirect()->route('frontend.login');
        } catch (Exception $e) {
            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }


    }

    public function showLoginForm()
    {
        $data = [];
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.login', $data);
    }

    public function processLogin(Request $request)
    {
        $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required'
        ]);
        $credentials= $request->except('_token');

        if (auth()->attempt($credentials)){
            return redirect()->route('frontend.home');
        }
        session()->flash('message', 'Email or Password Invalid');
        session()->flash('type', 'danger');

        return redirect()->back();


    }

    public function showProfile()
    {
        $data = [];
        $data['user']=auth()->user();
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.profile', $data);
    }
    public function showEditProfile()
    {
        $data = [];
        $data['user']=auth()->user();
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.edit_profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $user=optional(auth()->user());
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username,'.$user ->id,
            'email' => 'required|email|unique:users,email,'.$user ->id
        ]);
        $inputs=$request->except('_token');
        $user->update($inputs);
        session()->flash('message', 'Profile Updated');
        session()->flash('type', 'success');

        return redirect()->back();

    }


    public function updatePhoto(Request $request)
    {
        $user=optional(auth()->user());
        $this->validate($request,[
           'photo'=>'required|max:10240'
        ]);
        $photo = $request->file('photo');
        $file_name = uniqid('photo_', true) . time() . '.' . $photo->getClientOriginalExtension();

        if ($photo->isValid()) {
            $photo->storeAs('images', $file_name);
        }

        $user->update([
            'photo'=>$file_name
        ]);

        session()->flash('message','Profile photo updated');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $user=optional(auth()->user());
        $this->validate($request,[
           'password'=>'required|min:6|confirmed',
           'old_password'=>'required'
        ]);
        $credentials=[
          'email'=>$user->email,
          'password'=>$request->input('old_password')
        ];
        if (auth()->attempt($credentials)){
            $user->update([
                'password'=>bcrypt($request->input('password'))
            ]);
            session()->flash('message', 'Password Updated');
            session()->flash('type', 'success');

            return redirect()->back();

        }
        session()->flash('message', 'Old password is wrong');
        session()->flash('type', 'danger');

        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        session()->flash('message', 'User has been logout');
        session()->flash('type', 'danger');

        return redirect()->route('frontend.login');
    }

}
