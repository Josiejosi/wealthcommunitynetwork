<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;

use App\User ;
use App\Order ;


class HomeController extends Controller
{

    public function __construct() {

        $this->middleware('auth') ;

    }


    public function index()  {

        $showLink 								= Order::whereSenderId( auth()->user()->id )->whereStatus(3)->count() ;

        $outgoing 								= Order::whereSenderId( auth()->user()->id )->get() ;
        $incoming 								= Order::whereUserId( auth()->user()->id )->get() ;

        return view( 'home', [
            'showLink' 							=> $showLink,
            'outgoing' 							=> $outgoing,
            'incoming' 							=> $incoming,
        ] ) ;

    }
}
