<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('Frontend.MainPage.home');
    }
    public function aboutUs(){
        return view('Frontend.About.AboutUs');
    }
    public function contactUs(){
        return view('Frontend.Contact.ContactUs');
    }
}
