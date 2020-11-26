<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Niveau;


class RocketController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function levelJson($id)
    {
        $leveljson = Niveau::find($id);
        
        $leveljson = $leveljson->levelJson;
       
        
        return view('rocketLevels',["leveljson"=>$leveljson]);
    }
}




?>