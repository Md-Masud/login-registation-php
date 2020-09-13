<?php
class  Session
{
	
 public static function inti ()
 {
 	if(version_compare(phpversion(),'5.4.0','<'))
 	{
 		if(seesion_id()=='')
 		{
 			session_start();
 		}

 	}
 	else
 	{
 		if(session_status()==PHP_SESSION_NONE)
 		{
 			session_start();
 		}
 	}
 }
 public static function set($key,$value)
 {
 	$_SESSION[$key]=$value;
 }
 public static function get($key)
 {
 	if(isset($_SESSION[$key]))
 	{
 	   return $_SESSION[$key];
    }
    else
    {
    	return false;
    }
 }
 public static function destor()
 {
 	session_destroy();
 	session_unset();
 	header("location: login.php");
 }
 public static function checksSession()
 {
 	if (self::get("login") == false) {
 		self::destor();
 		header("location: login.php");
 	}
 }
 public static function checkLogin()
 {
 	if (self::get("login") == true) {
 		
 		//header("location: index.php");
 	}
 }
}




?>