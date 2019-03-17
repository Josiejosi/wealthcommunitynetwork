<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account ;

class AccountController extends Controller
{
    public function __construct() {

        $this->middleware('auth') ;

    }


    public function index()  {

        return view( 'account' ) ;

    }

    public function update( Request $request ) {

    	$this->validate( $request, [
    		'bank' 							        => 'required',
    		'account_number' 				     	=> 'required|unique:accounts',
    		'account_type' 					    	=> 'required',
    	]) ;

    	$account 										= Account::where( 'user_id', auth()->user()->id )->first() ;

    	$record 									= [

    		'bank' 							        => $request->bank,
    		'account_holder' 						=> $request->account_holder,
    		'account_number' 				     	=> $request->account_number,
    		'account_type' 					    	=> $request->account_type,

    	] ;

    	if ( $account->update( $record ) ) {

		    flash( 'Your banking details were successfully updated.' )->success() ;

    	} else {

    		flash( 'Something when wrong changing your banking details, please again later.' )->success() ;

    	}

    	return redirect()->back() ;

    }

}
