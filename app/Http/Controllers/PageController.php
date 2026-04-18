<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function returns()
    {
        return view('pages.returns');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
    
    public function faq()
    {
        return view('pages.faq');
    }
}