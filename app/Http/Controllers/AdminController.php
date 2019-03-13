<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Order ;

class AdminController extends Controller
{
    public function __construct() {  $this->middleware('auth') ; }

    public function users()  {

    	return view( 'admin.users', [ 'users' => User::all() ] ) ;

    }

    public function orders()  {

    	return view( 'admin.orders', [ 'orders' => Order::all() ] ) ;

    }

    public function admin_allocation()  {

    	return view( 'admin.admin_allocation', [ 

    		'orders' 					=> Order::where('status', 0)->get(), 
    		'admins' 					=> User::where( 'role', 3 )->orWhere( 'role', 2 )->get(),
    		 
    	] ) ;

    }

    public function post_admin_allocation( Request $request )  {

    	$order 							= $request->order ;
    	$admin 							= $request->admin ;

    	$update_order 					= Order::find($order) ;

    	if ( $update_order->update([ 'user_id' => $admin, 'status'=> 1 ]) ) {

    		//send member sms
    		//
		    flash( 'Admin allocated order.' )->success() ;
		    return redirect()->back() ;
    	}

    }

    public function member_allocation()  {

    	return view( 'admin.member_allocation', [ 

    		'orders' 					=> Order::where('status', 0)->get(), 
    		'members' 					=> User::where( 'role', 1 )->get(),

    	] ) ;

    }
}
