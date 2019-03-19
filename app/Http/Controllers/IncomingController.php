<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order ;

class IncomingController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }


    public function index()  {

        $incoming 								= Order::whereUserId( auth()->user()->id )->get() ;

        return view( 'incoming', [
            'incoming' 							=> $incoming,
        ]) ;

    }
}
