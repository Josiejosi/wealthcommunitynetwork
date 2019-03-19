<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Order ;

use Carbon\Carbon ;

use App\Classes\Helper ;

class AdminController extends Controller
{
    public function __construct() {  $this->middleware('auth') ; }

    public function users()  {

    	return view( 'admin.users', [ 'users' => User::where( 'role', 1 )->get() ] ) ;

    }

    public function orders()  {

    	return view( 'admin.orders', [ 'orders' => Order::all() ] ) ;

    }

    public function admin_allocation()  {

        return view( 'admin.admin_allocation', [ 

            'orders'                    => Order::where('status', 0)->where( 'user_id', 0 )->get(), 
            'admins'                    => User::where( 'role', 3 )->orWhere( 'role', 2 )->get(),
             
        ] ) ;

    }

    public function allocate_recommit()  {

    	return view( 'admin.allocate_recommit', [ 

    		'orders' 					=> Order::where('status', 0)->where( 'user_id', 0 )->get(), 
    		'admins' 					=> User::where( 'role', 3 )->orWhere( 'role', 2 )->get(),
    		 
    	] ) ;

    }

    public function post_admin_allocation( Request $request )  {

    	$order 							= $request->order ;
    	$admin 							= $request->admin ;

    	$update_order 					= Order::find($order) ;

        $amount                         = $update_order->amount ;

    	if ( $update_order->update([ 'user_id' => $admin, 'status'=> 1 ]) ) {

            $receiver                   = User::find( $admin ) ;
            $sender                     = User::find( $update_order->sender_id ) ;

            //sender sms.
            $msg = "Hi " . $sender->name . ", you're allocated to make a payment of R $amount to " . $receiver->name . " for more info visit: " . url('/') ;
            Helper::sendSMS( $sender->phone, $msg ) ;

            //receiver sms.
            //
            $msg = "Hi " . $receiver->name . ", " . $sender->name . " is allocated to you to make a payment of R $amount  for more info visit: " . url('/') ;
            Helper::sendSMS( $receiver->phone, $msg ) ;

		    flash( 'Admin allocated order.' )->success() ;
		    return redirect()->back() ;
    	}

    }

    public function post_recommit_allocation( Request $request )  {

        $order                              = $request->order ;
        $admin                              = $request->admin ;

        $order                              = Order::find($order) ;

        $amount                             = $order->amount ;

        $recommit_amount                    = ( $amount * 0.2 ) ;

        $new_amount                         = $amount - $recommit_amount ;

        $next_order                         = [

            'status'                        => 0, 
            'amount'                        => $recommit_amount , 
            'user_id'                       => $admin, 
            'type'                          => 1, 
            'days'                          => $order->days, 
            'percentage'                    => $order->percentage, 
            'sender_id'                     => $order->sender_id, 
            'matures_at'                    => Carbon::now()->addDays( $order->days ), 
            'expires_at'                    => Carbon::now()->addDays( $order->days ),

        ] ;

        ;

        if ( Order::create( $next_order ) ) {
            $order->update(['amount'=>$new_amount]) ;
            //send member sms
            //
            flash( 'Recommit order allocated.' )->success() ;
            return redirect()->back() ;
        }

    }

    public function member_allocation()  {

        return view( 'admin.member_allocation', [ 

            'orders'                    => Order::where('status', 0)->where( 'sender_id', 0 )->get(), 
            'members'                   => Order::where('status', 0)->where( 'sender_id', 0 )->where( 'matures_at', '>=', Carbon::now() )->get(),

        ] ) ;

    }

    public function post_member_allocation( Request $request )  {

        $order                           = $request->order ;
        $member                          = $request->member ;

        $update_order                    = Order::find($order) ;

        if ( $update_order->update([ 'sender_id' => $member, 'status'=> 1 ]) ) {


            $receiver                   = User::find( $member ) ;
            $sender                     = User::find( $update_order->sender_id ) ;

            //sender sms.
            $msg = "Hi " . $sender->name . ", you're allocated to make a payment of R $amount to " . $receiver->name . " for more info visit: " . url('/') ;
            Helper::sendSMS( $sender->phone, $msg ) ;

            //receiver sms.
            //
            $msg = "Hi " . $receiver->name . ", " . $sender->name . " is allocated to you to make a payment of R $amount  for more info visit: " . url('/') ;
            Helper::sendSMS( $receiver->phone, $msg ) ;

            flash( 'Member allocated order.' )->success() ;
            return redirect()->back() ;
        }

    }

    public function block()  {

        return view( 'admin.block', [ 

            'users'                     => User::where( 'role', 1 )->where('blocked', 0)->get(),

        ] ) ;

    }

    public function block_user($id)  {

    	$user = User::find( $id ) ;

        if ( $user->update(['blocked'=>1]) ) {

            flash( $user->name . ' successfully blocked.' )->success() ;

        } else {
            flash( 'Something went wrong.' )->success() ;
        }

        return redirect()->back() ;

    }
}
