<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Order ;

class PHController extends Controller {

    public function store( Request $request ) {

    	$this->validate( $request, [
    		'username' 						=> 'required',
    		'email' 						=> 'required',
    	]) ;

    }

}
