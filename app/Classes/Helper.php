<?php

namespace App\Classes ;


class Helper {

	public static function sendSMS( $num, $msg ) {

		$url = "https://www.winsms.co.za/api/batchmessage.asp?";

		$userp = "user=" ;

		$passwordp = "&password=" ;

		$messagep = "&message=" ;

		$numbersp = "&Numbers=" ;

		// WinSMS username variable - Set your WinSMS username here.
		$username = "wealthcomnet@gmail.com" ;

		// WinSMS password variable - Set your WinSMS password here.
		$password = "TY5X^5fE!bTt8ske" ; 

		// WinSMS message variable - Set your WinSMS message here.
		$message = $msg ;

		// URL encoding of your message.
		$encmessage = urlencode(utf8_encode($message)) ;

		// WinSMS cellphone numbers variable - Set your cellphone numbers here separated with a ;
		$numbers = $num ;

		// Combines all the variables together
		$all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers ;

		// Opens the URL in read only mode
		$fp = fopen($all, 'r') ;

		$lines = "" ;

		// Gets feedback from HTTP submittle
		while( !feof( $fp ) ) {

			$line = fgets( $fp, 4000 ) ;
			print($line);
			$lines+=$line ;

		}
		fclose($fp);
		return $lines ;
	}

}