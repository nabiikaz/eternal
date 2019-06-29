<?php

//setcookie("session", "nabi",time() + 1000);
//this class test whether a user is logged in or not  

 /**
 * dfkjf
 *lkksjfljdflj
 */
include_once "classes/sql.php";
 class Session 
 {
 	public $local_session ; // this  var will be initialised with the cookie that is saved on the user end (session_content)
 	public $sql_connection ; // 
 	function __construct()
 	{
 		 $this->sql_connection = new sql();


 		 //InitUserId();
 	}

 	/**
 	* this function initialize userid as a cookie to identify  users which are not logged-in every time they visits the website;
 	*/
 	private function InitUserId(){
 		//if the UserID cookie does not exist then we create it and initialize it to a random unique value if it exist then do nothing 
 			SetCookie("UserID",time()+""+rand(1,10000)); 

 	}


 	/**
	 * 	SetCookie is special than the php setcookie function this function has the override propritie
	 *	override is initialized to false  if it is set to true the the cookie will be overriden 
	 *	expire_time is initialized to 2592000 
	*/
 	protected function SetCookie($cookie_name,$value,$override=false,$expire_time=2592000){
 		if(!$override){
 			if($this->GetCookie($cookie_name) == false){
 				setcookie($cookie_name,$value,time()+$expire_time);
 			}else
 			{
 				return false ;  // the cookie already exist ,,, and the $override is false so it will not be overriden 
 			}
 		}
 		else{
 				setcookie($cookie_name,$value,time()+$expire_time);
 		}
 	}

 	protected function GetCookie($cookie_name){

 		if(isset($_COOKIE[$cookie_name]))
 			return $_COOKIE[$cookie_name];
 		else
 			return false;
 	}


 	protected function RemoveCookie($cookie_name){
 		setcookie($cookie_name, "",time() - 10000);
 	}
 }











?>