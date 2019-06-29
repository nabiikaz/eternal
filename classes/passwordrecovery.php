<?php
require_once 'PHPMAILER/PHPMailerAutoload.php';
require_once 'PHPMAILER/class.phpmailer.php';
require_once 'sql.php';




$mail = new PHPMailer();
//$mail->SMTPDebug = 3;
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';


$mail->Username = "nabiikaz2017@gmail.com";
$mail->Password = "iloveyou@2015/*-+";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "nabizaki@gmail.com";
$mail->FromName = "Eternal Service";


$mail->Subject = "Eternal Account Password Recovery";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$RecoveryToken ;


if(isset($_POST["email"])){
$mail->addAddress($_POST["email"]);
    if(TestIfEmailExist($_POST["email"])){
$mail->Body = "<h1>Recover your password</h1>
                <a href=\"http://localhost/Eternal/authentification.php?action=recover_password&token=$RecoveryToken\">Click Here To Recover Your Password</a>";

        if(!$mail->Send()){
            echo "Error: Email Couldn't Be sent.";//. $mail->ErrorInfo;
            exit();
        }
    }else{
       // echo "error email does not exist in the db";
    }

            echo "Success: Email Sent .";
    

}else {
    echo "Error";
    
    exit();
}


function TestIfEmailExist($email){
    $sql = new sql();
    $sql = $sql->connection;

    $query = "SELECT * FROM `authentification` WHERE `Email` LIKE '$email'";
    if($result = $sql->query($query))
        if($result->num_rows > 0){
        $AuthentificationId = $result->fetch_assoc()["Id"];
          return  SaveRecoveryLinkInDb($sql,$AuthentificationId);
            
        }
        else
            return false;
}

function SaveRecoveryLinkInDb($sql,$AuthentificationId){
    $RecoveryToken = md5(base64_encode( mt_rand(0,time()).mt_rand(0,time())));
    $query = "INSERT INTO `eternal`.`PasswordRecovery` (`RecoveryToken`, `authentification_Id`) VALUES ('$RecoveryToken', $AuthentificationId) 
                                                ON DUPLICATE KEY UPDATE `RecoveryToken` = '$RecoveryToken' ; ";

    if($sql->query($query)){
        $GLOBALS['RecoveryToken'] =  $RecoveryToken;
        return true;
    }else
        return false;
    

}

?>