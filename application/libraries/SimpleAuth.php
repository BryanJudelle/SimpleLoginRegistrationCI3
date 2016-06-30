<?php

/*
* @author: Bryan Judelle Ramos
* @date June 27, 2016
*
* 	This library that contains simple encryption using salt + sha256.
*
*/

class SimpleAuth {

	/*
	*  create hash value for password before storing it into database.
	*  The first 12 characters of the hash is the 6-character salt in Hex format.
    *  The next 64 characters is the SHA256 hash of the 6-character salt + password.
    *
    *  @params $password {String} - required
    *  @return hashed value {string}
	*/
    public function hash($password) {
        $salt = SimpleAuth::generate_salt();
        return bin2hex($salt).hash('sha256', $salt.$password);
    }

    /*
	* Check if the user password match to hashed-password with in the database.
	* 
	* @param $password {String} - user-input password.
	* @param $hash - {String} - hashed-password from database.
	* @return {boolean} TRUE - if match vice versa..
    */
    public function verify($password, $hash) {
        $salt = pack('H*', substr($hash, 0, 12));
        $sha2 = substr($hash, 12);
        return hash('sha256', $salt.$password) == $sha2;
    }

     /*
	* Generate salt which is from random token/
	* return $token {String}
    */
    private function generate_salt() {
        return SimpleAuth::generate_token(6);
    }

    /*
	*  Generate random string that composed of characters and numbers with the given length.
	*  @params $len - {Integer} DEFAULT - 16
	*  @return generated random string.
    */
    private function generate_token($len = 16) {
        $chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789';
        for ($pass = '', $i = 0; $i < $len; $i++) {
            $pass .= $chars[mt_rand(0,strlen($chars)-1)];
        }
        return $pass;
    }
}