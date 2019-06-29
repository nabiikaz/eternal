<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header("Connection: Keep-alive");
header('X-Accel-Buffering: no');//Nginx: unbuffered responses suitable for Comet and HTTP streaming applications
set_time_limit(60);

require_once "sql.php";


$i = 0;
while(true) {
    
        //echo "id: " . PHP_EOL;
        Refresh();
   
 
  $i++;
  
  sleep(1);
  
}


function Refresh($conx_status=-1){

          $returned_data = "-do nothing-";  
  $sql = new sql();
  $sql = $sql->connection;
if(isset($_COOKIE["LoginSession"]))
  $query = "SELECT *,count(*) count FROM `refreshwhenchange` WHERE `refreshwhenchange`.`Authentification_Id` = 
                                (SELECT `Authentification_Id` FROM `session` WHERE `Content` LIKE '". $_COOKIE["LoginSession"] ."') ";

  if($result = $sql->query($query)){
    
   // var_dump($result->fetch_assoc()["Id"]);
    $row = $result->fetch_assoc();
    
    if($row["count"] == 0)
       $returned_data = "-do refresh-";

    $query_update = "UPDATE `refreshwhenchange` SET `Refresh` = 0 WHERE `Id` = ".$row["Id"];
    
    if($sql->query($query_update)){
      if($row["Refresh"] == 1)
          $returned_data = "-do refresh-";

    }
    
  //  $returned_data =  Admin_ChangeUsersStatus($sql,$returned_data);


     
  }

   echo "data: $returned_data " . PHP_EOL;
        echo PHP_EOL;
        ob_flush();
        flush();
}
/*
function Admin_ChangeUsersStatus($sql,$returned_data){//this funtion is to set all the users session status to off ...(make them look like they are offline)
  $sql = new sql();
  $sql = $sql->connection;

  $query_admin = "UPDATE `session` SET  `Status` = 0 WHERE `Content` NOT LIKE '". $_COOKIE["LoginSession"] ."' ";
  $query_client = "UPDATE `session` SET  `Status` = 1 WHERE `Content` LIKE '". $_COOKIE["LoginSession"] ."'";
  if(AdminPrivilegeCheck($sql)){
    if($sql->query($query_admin)){
      sleep(3);
      if(isset($_GET["page"]))
        if($_GET["page"] == "dashboard")
           return "-do refresh-";
    }
  }else {
    if($sql->query($query_client)){
      return $returned_data;
    }
  }

   



}

/*

function AdminPrivilegeCheck($sql){

	if(isset($_COOKIE["LoginSession"])){
		$query = "SELECT `AdminPrivilege` FROM `authentification` ,`session` WHERE `authentification`.`Id` = `session`.`Authentification_Id` 
											AND `session`.`Content` = '". $_COOKIE["LoginSession"] ."' AND `AdminPrivilege` = 1";
		if($result  = $sql->query($query)){
			$row = $result->fetch_assoc();
      //echo $query;  
			if($row["AdminPrivilege"] != 1){
             return false;
      }
             return true;
		}
	}else
  {
             return false;
    
  }
	

}
*/
?>


