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



}
