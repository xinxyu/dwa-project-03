<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\RandomUserGenerator;
use Magyarjeti\LaravelLipsum\LipsumFacade;
use Illuminate\Support\Facades\File;


class PageController extends Controller
{
    public function homePage()
    {
        return view('pages.home');
    }

    public function textGenerator()
    {
        return view('pages.textGenerator')->with(['numberOfParagraphs' => 5, 'paragraphLength' => 'Medium' ,'text' => LipsumFacade::medium()->text(5)]);
    }

    public function textGeneratorProcess(Request $request)
    {

        $this->validate($request,[
            'numberOfParagraphs' => 'required|numeric|between:1,20',
            'paragraphLength' => 'required|in:Short,Medium,Long,Verylong'
        ]);

        if($request['paragraphLength'] == 'Short')
        {
            $text = LipsumFacade::short()->text($request['numberOfParagraphs']);
        }
        else if ($request['paragraphLength'] == 'Medium'){
            $text = LipsumFacade::medium()->text($request['numberOfParagraphs']);
        }
        else if ($request['paragraphLength'] == 'Long'){
            $text = LipsumFacade::long()->text($request['numberOfParagraphs']);
        }
        else{
            $text = LipsumFacade::verylong()->text($request['numberOfParagraphs']);
        }

        return view('pages.textGenerator')->with(['numberOfParagraphs' => $request['numberOfParagraphs'], 'paragraphLength' => $request['paragraphLength'] ,'text' => $text]);
    }

    public function userGenerator()
    {
        $randUserGen = new RandomUserGenerator();

        $randomUsers = $randUserGen->generateUsers(5, "Mixed");

        return view('pages.userGenerator')->with(['numberOfUsers' => 5, 'gender' => 'Mixed','randomUsers'=> $randomUsers]);
    }

    public function userGeneratorProcess(Request $request)
    {

        $randUserGen = new RandomUserGenerator();





        $this->validate($request,[
            'numberOfUsers' => 'required|numeric|between:1,20',
            'gender' => 'required|in:Male,Female,Mixed'
        ]);


        $randomUsers = $randUserGen->generateUsers($request["numberOfUsers"],$request["gender"]);



        return view('pages.userGenerator')->with(['numberOfUsers' => $request['numberOfUsers'], 'gender' => $request['gender'] ,'randomUsers' => $randomUsers]);;
    }
}
