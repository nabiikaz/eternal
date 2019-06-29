<?php


//include_once ".classes//sql.php";
require_once explode("controller",dirname(__FILE__))[0] ."classes/sql.php";


//LoginWithSession("");
//AdminPrivilegeCheck();


function AdminPrivilegeCheck($return=false){
	$sql = new SQL();
	$sql = $sql->connection;
	if(isset($_COOKIE["LoginSession"])){
		$query = "SELECT `AdminPrivilege` FROM `authentification` ,`session` WHERE `authentification`.`Id` = `session`.`Authentification_Id` 
											AND `session`.`Content` = '". $_COOKIE["LoginSession"] ."' AND `AdminPrivilege` = 1";
		if($result  = $sql->query($query)){
			$row = $result->fetch_assoc();
      //echo $query;  
			if($row["AdminPrivilege"] != 1){
           if($return == false)
				    header("Location: index.php?error=no_permission");
            else if($return == true)
             return false;
      }
      if($return == true)
             return true;
		}
	}else
  {
    if($return == false)
		    header("Location: authentification.php?action=login");
    else if($return == true)
             return false;
    
  }
	

}

function LoginWithSession_(){ //check if the user has a valid client session if yes then redirect to the index (home page) else redirect to login page wih Get Parameters " ?action=login"
  
  if(isset($_COOKIE["LoginSession"])){
            $sql = new sql();
        $sql = $sql->connection;
        
       $LoginSession =  $_COOKIE["LoginSession"];
        $query = "SELECT `Authentification_Id`,count(*) count FROM `session` WHERE 
                                   `ExpiryDate` > NOW() AND `Content` = '$LoginSession' && `Status` = 1 ;";
     // echo $query;
       // echo $query;
      if( $result = $sql->query($query)){
             $row = $result->fetch_assoc();
             if($row["count"] > 0){
                 return  ' <b class="my_account" > My Account</b>
                        <ul class="list-group my_account_list text-center collapse" style="position: absolute;z-index: 3;background-color: white;">
                            
                            <li onclick="location.href=\'settings.php\'">Settings <span  class="glyphicon glyphicon-cog"></span></li>
                            <hr>
                            <li onclick="location.href=\'authentification.php?action=logout\'">Logout<span style="margin-left:15px;" class="glyphicon glyphicon-log-out"></span></li>
                            
                        </ul>';
             }else{
              
               
               
             setcookie("LoginSession","",time() - 1000,"/");
             header("refresh:0");
            /* header("location: authentification.php?action=logout");
               return  '<b onclick="location.href=\'authentification.php?action=login\' ">Sign in &nbsp;	 / </b> &nbsp;	 <b onclick="location.href=\'authentification.php?action=registration\' ">Register</b>';
             */
             
             //setcookie("LoginSession","",time() - 1000,"/");
             
                
             }

                    

             
            // setcookie("LoginSession","",time() - 1000,"/");
          
                          
             
            
             
           
       }
       
    }else
     return  '<b onclick="location.href=\'authentification.php?action=login\' ">Sign in &nbsp;	 / </b> &nbsp;	 <b onclick="location.href=\'authentification.php?action=registration\' ">Register</b>';
    
   
 }

 

?>