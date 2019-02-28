<?php

use Illuminate\Database\Seeder;

use App\User ;
use App\Account ;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add admin user.
        //
        $user 						= User::create([

        	'name' 					=> 'Wealth Community Network', 
        	'email' 				=> 'wcn@gmail.com', 
        	'password' 				=> Hash::make( "TY5X^5fE!bTt8ske" ), 
        	'role' 					=> 3, 
        	'phone' 				=> '000000000', 
        	'username' 				=> 'wcn001', 
        	'active' 				=> 1, 
        	'blocked' 				=> 0,

        ]) ;

        Account::create([

	       	'bank_name' 			=> 'ABSA', 
	        'account_holder' 		=> 'Wealth Community Network', 
	        'account_number' 		=> '00000000', 
	        'account_type' 			=> 'Savings Account',

	        'user_id' 				=> $user->id,

        ]) ;
    }
}
