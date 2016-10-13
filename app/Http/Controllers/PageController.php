<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function homePage()
    {
        return view('pages.home');
    }

    public function textGenerator()
    {
        return view('pages.textGenerator');
    }

    public function userGenerator()
    {
        return view('pages.userGenerator');
    }
}
