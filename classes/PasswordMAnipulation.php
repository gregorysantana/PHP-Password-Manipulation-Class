<?php
class PasswordMAnipulation
{

	const PASS_MIN_LEN = 8;

	public function generatePassword()
	{
		$salts = $this->salts(12);
		$special_char1 = "~<>?|:.(),";
		$special_char2 = '!@#$%^&*_+-*+';
		$pass = $special_char2.$salts.$special_char1;
		return str_shuffle($pass);
	}
	public function hashMatched($password,$hash)
	{
		return password_verify($password, $hash);
	}
	public function hashPassword($password)
	{
		return password_hash($password,PASSWORD_ARGON2I);
	}
	public function isValid($password)
	{
		return ($this->isU($password) && $this->isL($password) && $this->isN($password) && $this->isS($password) && $this->len($password) >= PasswordMAnipulation::PASS_MIN_LEN) ? true : false;
	}
	public function isU($password)
	{
		return preg_match('/[A-Z]/', $password);
	}	
	public function isL($password)
	{
		return preg_match('/[a-z]/', $password);
	}	
	public function isN($password)
	{
		return preg_match('/[0-9]/', $password);
	}
	public function isS($password)
	{
		return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password);
	}	
	public function len($password)
	{
		return strlen($password);
	}
	public static function Salts($length)
	{		
		$chars =  array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
		$stringlength = count( $chars  );
		$randomString = '';
		for ( $i = 0; $i < $length; $i++ ) {
			$randomString .= $chars[rand( 0, $stringlength - 1 )];			
		}		
		return $randomString;		
	}	
}