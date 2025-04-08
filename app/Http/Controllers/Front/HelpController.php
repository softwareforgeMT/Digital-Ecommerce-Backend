<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index()
    {
        return view('front.help.overview');
    }

    public function faqs()
    {
        return view('front.help.faqs');
    }

    public function guides()
    {
        return view('front.help.guides');
    }

    public function terms()
    {
        return view('front.help.terms');
    }

    public function privacy()
    {
        return view('front.help.privacy');
    }
}
