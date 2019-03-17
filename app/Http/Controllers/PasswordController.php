<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;

use App\User ;

class PasswordController extends Controller
{
    public function __construct() {

        $this->middleware('auth') ;

    }


    public function index()  {

        return view( 'password' ) ;

    }

    public function update( Request $request ) {

    	$this->validate( $request, [
    		'password'              		=> 'required|string|min:6|confirmed',
    	]) ;

    	$user 								= User::find(auth()->user()->id) ;

    	if ( $user->update(['password'=>Hash::make( $request->password )]) ) {

		    flash( 'Your password was successfully updated.' )->success() ;

    	} else {

    		flash( 'Something when wrong changing your password, please again later.' )->success() ;

    	}

    	return redirect()->back() ;

    }
}
