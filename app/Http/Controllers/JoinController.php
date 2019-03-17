<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Hash ;

use App\User ;
use App\Upliner ;
use App\Account ;
use App\Downliner ;

class JoinController extends Controller
{
    public function index( $upliner_id ) {

    	$upliner 							= [] ;

    	if ( User::whereUsername( $upliner_id )->count() == 1 ) {
    		$upliner 						= User::whereUsername( $upliner_id )->first() ;
    	}

    	return view( 'front.join', [ 'upliner' => $upliner ] ) ;

    }

    public function store( Request $request ) {

    	$this->validate( $request, [
    		'username' 						       => 'required|unique:users|min:6',
    		'email' 						        => 'required',
    		'phone' 						        => 'required|unique:users',
    		'name' 							        => 'required',
    		'password'              		=> 'required|string|min:6|confirmed',

    		'bank' 							        => 'required',
    		'account_number' 				     => 'required|unique:accounts',
    		'account_type' 					    => 'required',
    	]) ;

    	$upliner 							         = $request->upliner_id ;
    	

        $user 								      = User::create([

        	'name' 							       => $request->name , 
        	'email' 						       => $request->email , 
        	'password' 						      => Hash::make( $request->password ) , 
        	'role' 							       => 1, 
        	'phone' 						       => $request->phone, 
        	'username' 						      => $request->username, 
        	'active' 						        => 1, 
        	'blocked' 						     => 0,

        ]) ;

        $downliner 							= $user->id ;

        Account::create([

	       	'bank_name' 					=> $request->bank , 
	        'account_holder' 				=> $request->name, 
	        'account_number' 				=> $request->account_number , 
	        'account_type' 					=> $request->account_type ,

	        'user_id' 						=> $downliner ,

        ]) ;

       	//Add upliner.
       	//
       	Upliner::create([
       		'user_id' 						=> $downliner ,
        	'upliner_id' 					=> $upliner ,
       	]) ;

       	//Add downliners.
       	//
       	Downliner::create([
       		'user_id' 						=> $upliner ,
        	'downliner_id' 					=> $downliner ,
       	]) ;


		if ( auth()->attempt([ 'email' => $request->email, 'password' => $request->password, ] ) ) {

		    flash( 'Your profile was created successfully.' )->success() ;
		    return redirect( '/home' ) ;
		    
		} else {
		    flash( 'Something when wrong while authenticating to your profile, please login manually.' )->success() ;
		    return redirect( '/login' ) ;			
		}

    }
}
