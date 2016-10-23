<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Magyarjeti\LaravelLipsum\LipsumFacade;


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

    public function textGeneratorProcess(Request $request)
    {

        $this->validate($request,[
            'pNum' => 'required|numeric|between:1,20',
            'pLength' => 'required|in:short,medium,long,verylong'
        ]);

        if($request['pLength'] == 'short')
        {
            $text = LipsumFacade::short()->text($request['pNum']);
        }
        else if ($request['pLength'] == 'medium'){
            $text = LipsumFacade::medium()->text($request['pNum']);
        }
        else if ($request['pLength'] == 'long'){
            $text = LipsumFacade::long()->text($request['pNum']);
        }
        else{
            $text = LipsumFacade::verylong()->text($request['pNum']);
        }

        return view('pages.textGenerator')->with(['pNum' => $request['pNum'], 'pLength' => $request['pLength'] ,'text' => $text]);
    }

    public function userGenerator()
    {
        return view('pages.userGenerator');
    }

    public function userGeneratorProcess(Request $request)
    {
        return view('pages.userGenerator');
    }
}
