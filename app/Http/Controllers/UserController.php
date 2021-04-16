<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function feedback(Request $request)
    {
        //dump($request->get('mail'));
        $feedback = new Feedback;

        $feedback->name = $request->get('name');

        $feedback->message = $request->get('feedback');

        if($request->get('mail') != null)
        {
            $feedback->mail = $request->get('mail'); 
        }

        $feedback->save();


    
       
        return view('home');
    }
}
