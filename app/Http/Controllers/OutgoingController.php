<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order ;

class OutgoingController extends Controller
{
    public function __construct() {

        $this->middleware('auth') ;

    }


    public function index()  {

        $outgoing 								= Order::whereSenderId( auth()->user()->id )->get() ;

        return view( 'outgoing', [
            'outgoing' 							=> $outgoing,
        ]) ;
    }
}
