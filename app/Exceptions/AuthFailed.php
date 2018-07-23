<?php 

namespace App\Exceptions;

use Exception;

class AuthFailed extends Exception {

	public function render(){
		return response()->json(['message'=>'your email or password is wrong'],422);
	}

}







