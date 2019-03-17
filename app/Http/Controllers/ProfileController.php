<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class ProfileController extends Controller
{
    public function __construct() {

        $this->middleware('auth') ;

    }


    public function index()  {

        return view( 'profile' ) ;

    }

    public function update( Request $request ) {

    }
}
