<?php

//  SELECT * FROM (SELECT `Authentification_Id`,`Email`,`Blocked`,`ClientFullName`,`ResidenceCity`,`Phone` FROM `user`,`authentification` WHERE `user`.`Authentification_Id` = `authentification`.`Id`) t1 LEFT JOIN (SELECT `Authentification_Id`,`Status`,`Expired` FROM `session`) t2 ON t1.`Authentification_Id` = t2.`Authentification_Id`
require_once "classes/sql.php";


if(isset($_GET["action"])){
    if($_GET["action"] == "logout"){
        logout();
        
    }
LoginWithSession("index.php?home=welcome"); 
    
    switch($_GET["action"]){
        case "login" : 
            Login();
        break;

        case "registration" :
            Registration();
        break;
        case "forgot_password" :
            PasswordRecovery();
        break;

        default :
                LoginWithSession("index.php?home=welcome");
        break;

    }
}else{
LoginWithSession("index.php?home=welcome"); 
            
    
}
if(isset($_POST["newpassword"]) && isset($_POST["token"])){
    $token = $_POST["token"];
    $password = $_POST["newpassword"];
    ChangePassword($token,$password);
   // header("Location: authentification.php?action=recover_password&token=$token&password=$password");
}

function FollowReturnUrl(){
    if(isset($_GET["return_url"])){
        header("Location: ".$_GET["return_url"]);
    }
}

function ChangePassword($token,$password){
        $sql = new sql();
        $sql = $sql->connection;

        $query = "UPDATE `authentification` SET `Password`= '$password' WHERE
                         `Id` = ANY (SELECT `authentification_Id` FROM `passwordrecovery` WHERE `RecoveryToken` LIKE '$token')";

        if($result = $sql->query($query)){
            
            header("Location: authentification.php?action=login&success=password_changed");
        }else{
            header("Location: authentification.php?action=login&error=token_not_valid");
            
        }

}



function Login(){
    if(isset($_POST["email"]) && isset($_POST["password"])){
       $sql = new sql();
        $sql = $sql->connection;

       $query = "SELECT `Blocked`,`Id`,count(*) count FROM `authentification` WHERE `Email` like '".$_POST["email"] . "' AND `Password` like '".$_POST["password"] . "' ;";
       if( $result = $sql->query($query)){
             $row = $result->fetch_assoc();
             
             if($row["count"] == 0){
                 header("Location: authentification.php?action=login&error=wronginfo");
             }else  {
                 if($row["Blocked"] == 1){
                    header("Location: authentification.php?action=login&error=userblocked");
                    exit();
                 }

                 CreateSession($row["Id"]);
                 header("Location: index.php?home=welcome");
                 exit();
                 
             }
           
       }
       
//       var_dump($sql->connection->query($query)->);
    }
    
}

function CreateSession($AuthentificationId){
    $sql = new sql();
    $sql = $sql->connection;

    $date = new DateTime(); 
    $StartDate = $date->format('Y-m-d');
    date_add($date, date_interval_create_from_date_string('60 days'));
    $ExpiryDate = $date->format('Y-m-d');
  
    

    $session_content = md5(base64_encode( mt_rand(0,time()).mt_rand(0,time())));

    $query = "INSERT INTO `session` ( `Authentification_Id`, `Content`, `StartDate`, `ExpiryDate`, `Status`) VALUES
                                ( '$AuthentificationId', '$session_content', '$StartDate', '$ExpiryDate', 1)
              ON DUPLICATE KEY UPDATE `Content` ='$session_content', `StartDate` = '$StartDate' ,`ExpiryDate` ='$ExpiryDate' ,`Status` = 1;";
                              
    // echo $query;
      if(! $sql->query($query))
            header("Location: authentification.php?action=login&error=error_session_creation");
    
    setcookie("LoginSession",$session_content,time()+1000000,"/");

    header("Location: index.php?home=welcome");
    


    


}




function Registration(){
    if(isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"]) && isset($_POST["address"]) ){
        $sql = new sql();
        $sql = $sql->connection;

        UserExist($_POST["email"],"authentification.php?action=registration&error=emailexist");

            $query = "INSERT INTO `authentification` (`Email`, `Password`, `AdminPrivilege`) VALUES 
            ('".$_POST["email"] . "',  '".$_POST["password"] . "', '0');";

       if(! $sql->query($query))
            return false;

        $Authentification_Id = $sql->insert_id;

            $query = "INSERT INTO `user` (`Authentification_Id`, `ClientFullName`, `ResidenceCity`, `Phone`) VALUES
                         ( '$sql->insert_id', '".$_POST["fullname"] . "', '".$_POST["address"] . "', '".$_POST["phone"] . "');";
       if(! $sql->query($query))
            return false;
        else{
            AddUserToRefreshTable($Authentification_Id);
        }

        //if the execution reaches this part then its means that the user has been created now lets autologin him :
        Login();
        

        $sql->close();

    }
}

function AddUserToRefreshTable($AuthentificationId){
    $sql = new sql();
    $sql = $sql->connection;

    $query = "INSERT INTO `refreshwhenchange` (`Authentification_Id`) VALUES ($AuthentificationId) ON DUPLICATE KEY UPDATE `Authentification_Id` = $AuthentificationId ";

    if($sql->query($query)){

    }
   
}

function PasswordRecovery(){

  

    }


function LoginWithSession($redirectionPage){ //check if the user has a valid client session if yes then redirect to the index (home page) else redirect to login page wih Get Parameters " ?action=login"
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
                FollowReturnUrl();
                 header("Location: $redirectionPage");
             }else{
             setcookie("LoginSession","",time() - 1000,"/");
       }
             
           
       }
       return false;
        }
    
 }

function logout(){
    
    if(isset($_COOKIE["LoginSession"])){
         $sql = new sql();
        $sql = $sql->connection;
        $query = "UPDATE `session` SET `Expired` = 0 , `Status` = 0  WHERE `Content` LIKE '". $_COOKIE["LoginSession"] ."'; ";
        echo $query;
        setcookie("LoginSession","",time() - 1000,"/");
        if($sql->query($query)){
            FollowReturnUrl();
        }
           
        
        
        
    }

    header("Location: index.php?home=");
    
    
}


function UserExist($email,$redirectionPage){// check if user exist 
     $sql = new sql();
        $sql = $sql->connection;
        $query = "SELECT count(*) count FROM `authentification` WHERE `Email` = '$email'";
       // echo $query;
       if( $result = $sql->query($query)){
             $row = $result->fetch_assoc();
             if($row["count"] > 0){
                 header("Location: $redirectionPage");
             }else 
             return true;
           
       }
           
            
        
}








/*
  require_once "..classes//PHPMailer/PHPMailerAutoload.php";
try{
 $mail = new PHPMAILER();
    //$mail->SMTPSebug = 2;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMPTSecure = 'ssl';
    $mail->Host = "smpts.gmail.com";
    $mail->Port = "25";
 //   $mail->isHTML(true);
    $mail->Username = "nabiikaz2017@gmail.com";
    $mail->Password = "iloveyou@2015/*-+";
    $mail->SetFrom("nabiikaz2017@gmail.com");
    $mail->Subject = "Password Recovery";
   // $mail->Body    = "Your Password recovery Link is :";
    $mail->AddAddress("nabizakariatlemcen@gmail.com");

   if($mail->send())
    echo "msg has been sent";
}catch(Exception $e){
    echo "error :<br>".$mail->ErrorInfo;
}

   


*/















?>