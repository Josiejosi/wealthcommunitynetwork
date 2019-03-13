<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Order ;
use App\Upliner ;

use Carbon\Carbon ;

class PHController extends Controller {

    public function store( Request $request ) {

    	$this->validate( $request, [
    		'amount' 						=> 'required',
    		'number_of_days' 				=> 'required',
    	]) ;

    	// 0 = not allocated, 1 = allocated, 2 = reserved for payment, 3 = payment received.
    	//
    	$have_pending_order 				= Order::where( 'status', 0 )
    											->where( 'user_id', auth()->user()->id )
    											->orWhere( 'status', 1 )
    											->orWhere( 'status', 2 )->count() ;


    	if ( $have_pending_order > 0 ) {
    		
		    flash( 'You need to complete the pending order before making another 1.' )->warning() ;
		    return redirect()->back() ;

    	}

    	/**
    	 * get upliner details.
    	 **/

    	$amount 							= $request->amount ;										
    	$days 								= $request->number_of_days ;

    	$percentage 						= 100 ;

    	if ( $days == 7 ) $percentage 		= 50 ;
    	if ( $days == 15 ) $percentage 		= 75 ;



    	if ( Order::where( 'sender_id', auth()->user()->id )->count() == 0 ) {

	    	$upliner 						= Upliner::where( 'user_id', auth()->user()->id )->first() ;

	    	$upliner_id 					= $upliner->upliner_id ;

    		$upliner_amount 				= ( $amount * 15 ) / 100 ;

    		$amount 						= $amount - $upliner_amount ;

	    	$upliner_order 					= [

		        'status' 					=> 1, 
		        'amount' 					=> $upliner_amount , 
		        'user_id' 					=> $upliner_id, 
		        'type' 						=> 0, 
		        'days' 						=> $days, 
        		'percentage' 				=> $percentage, 
		        'sender_id' 				=> auth()->user()->id, 
		        'matures_at' 				=> Carbon::now(), 
		        'expires_at' 				=> Carbon::now()->addHours(12),

	    	] ;

	    	Order::create( $upliner_order ) ;

	    	flash( 'Please pay your upliner in the next 12 hours.' )->success() ;

    	}

    	//$matority_amount 					= $amount + ( $amount * $percentage / 100 ) ;

    	$next_order 						= [

	        'status' 						=> 0, 
	        'amount' 						=> $amount, 
	        'user_id' 						=> 0, 
	        'type' 							=> 1, 
		    'days' 							=> $days, 
        	'percentage' 					=> $percentage, 
	        'sender_id' 					=> auth()->user()->id, 
	        'matures_at' 					=> Carbon::now()->addHours( $days ), 
	        'expires_at' 					=> Carbon::now()->addHours( $days ),

    	] ;

    	Order::create( $next_order ) ;

	    flash( 'Your order was created, you will receive an sms once you are allocated' )->success() ;
	    return redirect()->back() ;

    }

    public function cash_deposited( $order_id ) {

    	$order 										= Order::find( $order_id ) ;

    	if ( $order->update([ 'status' => 2 ]) ) {
    		flash( 'Please wait for member to confirm' )->success() ;
    	} else {
    		flash( 'Something went wrong.' )->success() ;
    	}

    	return redirect()->back() ;
    }

    public function cash_received( $order_id ) {

    	$order 										= Order::find( $order_id ) ;

    	if ( $order->update([ 'status' => 3 ]) ) {

    		if ( $order->type == 1 ) {

    			$matority_amount 					= $order->amount + ( $order->amount * $order->percentage / 100 ) ;

		    	$next_order 						= [

			        'status' 						=> 0, 
			        'amount' 						=> $matority_amount, 
			        'user_id' 						=> $order->sender_id, 
			        'type' 							=> 1, 
		    		'days' 							=> $order->days, 
        			'percentage' 					=> $order->percentage, 
			        'sender_id' 					=> 0, 
			        'matures_at' 					=> Carbon::now()->addHours( $order->days ), 
			        'expires_at' 					=> Carbon::now()->addHours( $order->days ),

		    	] ;

		    	Order::create( $next_order ) ;
    		}

    		flash( 'Order is now complete' )->success() ;
    	} else {
    		flash( 'Something went wrong.' )->success() ;
    	}

    	return redirect()->back() ;

    }

}
