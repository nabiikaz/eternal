<?php
require_once "sql.php";
$sql = new sql();
$sql = $sql->connection;

if(isset($_POST["remove_purchase"])){
    $query = "DELETE FROM `purchases` WHERE `Id` = ".$_POST["remove_purchase"];

    if($sql->query($query)){
        echo "purchase_deleted";
    }else
        echo "Error Deleting Purchase";
    


    exit();
}

if(isset($_POST["add_new_payment_method"]) && isset($_POST["password"])){
    $bank_account_key = $_POST["add_new_payment_method"];
    $password = $_POST["password"];
    $auth_id = GetAuthentificationId($sql);
    CheckUserPassword($sql,$password,$auth_id);
    Add_new_payment_method($sql,$auth_id,$bank_account_key);
}
function Add_new_payment_method($sql,$auth_id,$bank_account_key){
    $query = "INSERT INTO `vbankaccount` (`Authentification_Id`,`Account_Key`) VALUES ($auth_id,'$bank_account_key') ON DUPLICATE KEY UPDATE 
                                                 `Account_Key`  = '$bank_account_key' ,  `Balance` = 999999  ";
    if($sql->query($query)){
        echo "new_account_has_been_added";
        exit();
    }else{
        echo "error_adding_new_bank_account";
        exit();
    }
}

if(isset($_POST["CheckOutCart"]) && isset($_POST["password"]) ){
    if(!isset($_COOKIE["LoginSession"])){
        echo "checkout_confirmation_error_user_not_connected";
        
    }

    
    $date = new DateTime(); 
    $addDate = $date->format('Y-m-d');
    $json_content = $_POST["CheckOutCart"];
    $auth_id = GetAuthentificationId($sql);
    
    
    $json_content = CheckJsonContent($json_content);
    if(count(json_decode($json_content,true)) == 0){
         DeleteCartItems($sql);
       
        ChangeRefresh();
        exit();
    }
    
    
    
    //get the purchase price 
    
    $purchase_price = GetPurchasePrice($json_content);
    
    
    
    
    /////////////////
    
    
    CheckUserPassword($sql,$_POST["password"],$auth_id);
    TestPaymentMethod($sql,$auth_id);
    UpdateItemsAfterPurchase($sql,$json_content,0);
    
    UpdateItemsAfterPurchase($sql,$json_content,1);
    WithdrawAmount($sql,$auth_id,$purchase_price);
    $Purchase_QrCode_content = base64_encode(md5(time().$auth_id.mt_rand(1,100)));
    $query = "INSERT INTO `purchases`( `authentification_Id`, `Purchased_Items`, `Purchase_Date`, `Purchase_QrCode_content`) VALUES
                                    ($auth_id, '$json_content', '". $addDate ."', '$Purchase_QrCode_content')";
    if($sql->query($query)){
       
        DeleteCartItems($sql);
        echo "payment_confirmed_alert";
        sleep(3);
        ChangeRefresh();
        
        
    }else
     echo "server_error";
     exit();
      //  echo $query;

}
/////////////////Get The Purchase Price//////////

function GetPurchasePrice($json_content){
   // echo "<pre>";
    $array = json_decode($json_content,true);
    //var_dump($array);
    if($array == null)
        return 0;
    
    $price = 0;
    foreach ($array as $key => $item) {
        
         $price +=   ($item["item_qte_nosize"] +$item["item_qte_xs"]+$item["item_qte_m"]+$item["item_qte_s"]+$item["item_qte_l"]+$item["item_qte_xl"]+$item["item_qte_xxl"]+$item["item_qte_xxxl"])*$item["item_price"];
         
          
    }

    
    return $price;
    

}














///////////////////////////////////////////////
////////////////////////////////////

function CheckJsonContent($json_content){
   // echo "<pre>";
    $array = json_decode($json_content,true);
    //var_dump($array);

    
    foreach ($array as $key => $item) {
        if($item["item_qte_nosize"] == 0 && $item["item_qte_xs"] == 0 &&  $item["item_qte_m"] == 0 && $item["item_qte_s"] == 0 && $item["item_qte_l"] == 0 && $item["item_qte_xl"] == 0 && $item["item_qte_xxl"] == 0 && $item["item_qte_xxxl"] == 0)
           unset($array[$key]);
    }

    
    return json_encode($array);
    

}

////////////////////////////////////


function TestPaymentMethod($sql,$auth_id){
    $query = "SELECT * FROM `vbankaccount` WHERE `Authentification_Id` = $auth_id";
    if($result = $sql->query($query)){
        if($result->num_rows == 1){
            return  true;
            
        }else{
            echo "account_with_no_payment_method";
            exit();
            
            
            
        }
    }
   
    
}

function WithdrawAmount($sql,$auth_id,$Amount){
    $query = "UPDATE `vbankaccount` SET `Balance` = (`Balance` - $Amount)  WHERE `Authentification_Id` = $auth_id AND `Balance` >= $Amount";
  

    if($result = $sql->query($query)){
       
        
        if($sql->affected_rows == 1){
       
            
            return true;
        }else{
       
            
            echo "balance_insuffisant";
            exit();
        }
       
        
        
    }
    var_dump($sql->error_list);
}

function CheckUserPassword($sql,$password,$auth_id){
    $query = "SELECT * FROM `authentification` WHERE `Id` = $auth_id  AND `Password` LIKE '$password' ";
    $Number_of_tries_reset = 0;
    
    $check_num_of_tries_query = "SELECT `Number_of_tries`, `unblock_status` FROM `vbankaccount` WHERE     `Authentification_Id` = $auth_id ";
                            
    $unblock_payment_query = "CREATE EVENT unblock_status_$auth_id
                            on schedule at current_timestamp + interval 1 DAY
                            DO
                            UPDATE `vbankaccount` set `unblock_status` = 0,`Number_of_tries` = 0   WHERE     `Authentification_Id` = $auth_id"   ;                                     
    $num_days = 0;
    if($result = $sql->query($query)){
        if($result->num_rows == 1){
            $unblock_payment_query = "UPDATE `vbankaccount` set `unblock_status` = 0,`Number_of_tries` = 0   WHERE     `Authentification_Id` = $auth_id"   ;                                     
           if($sql->query($unblock_payment_query)){
                 return true;
           }else{
               echo "server_error";
           }
        }
        else {
            if($result = $sql->query($check_num_of_tries_query)){
                $row = $result->fetch_assoc();
                $block = 0;
                if($row["Number_of_tries"] > 4 ){
                    //block the payment method;
                    $block = 1;
                    //then execute the event that will unblock the payment method after 24 hours 
                    echo "payment_frosen";
                    $sql->query($unblock_payment_query);
                }else {
                    $block = 0;
                    echo "error_password_alert";
                }

                $update_block_payment_query = "UPDATE `vbankaccount` set `unblock_status` = $block ,`Number_of_tries` = `Number_of_tries`+1 WHERE     `Authentification_Id` = $auth_id ";
                $sql->query($update_block_payment_query);
                
            }
            exit();
        }
    }
}




//echo GetAuthentificationId($sql);
function GetAuthentificationId($sql){
    $query = "SELECT `Authentification_Id` FROM  `session` WHERE `Content` LIKE  '".$_COOKIE["LoginSession"]."';";
    if($result = $sql->query($query)){
        $row = $result->fetch_assoc()['Authentification_Id'];
        return $row;
        
    }else
        echo "checkout_confirmation_error";
        exit();
}



function DeleteCartItems($sql){
    if(!isset($_COOKIE["UserID"]))
        return false;
    $query = "UPDATE `tmpcart` SET `JsonContent` = '' WHERE `UserID` = ".$_COOKIE["UserID"];
    if($sql->query($query)){
        ChangeRefresh();
        return true;
    }else
       

    return false;

}


/*//var_dump(json_decode('{"0" : { "item_name" : "Crayon Essentiel", "item_qte_nosize" : "2", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "999.99"},"1" : { "item_name" : "bonnet - brique ", "item_qte_nosize" : "1", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "1.00"},"2" : { "item_name" : "casquette - bleu ciel ", "item_qte_nosize" : "1", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "1.00"},"3" : { "item_name" : "ra1163 - lot de 3 paires de chaussettes - noi", "item_qte_nosize" : "1", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "1.00"}}',true));
echo "<pre>";
$json_content = '{"0" : { "item_name" : "b-wildd - ceinture en cuir - marron ", "item_id" : "241", "item_qte_nosize" : "4", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "1.00"},"1" : { "item_name" : "casquette - bicolore ", "item_id" : "242", "item_qte_nosize" : "1", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "1.00"},"2" : { "item_name" : "bonnet - brique ", "item_id" : "240", "item_qte_nosize" : "3", "item_qte_xs" : "0", "item_qte_s" : "0", "item_qte_m" : "0", "item_qte_l" : "0", "item_qte_xl" : "0", "item_qte_xxl" : "0", "item_qte_xxxl" : "0", "item_price" : "1.00"}}';
UpdateItemsAfterPurchase($sql,$json_content);
*/
function UpdateItemsAfterPurchase($sql,$json_content,$test){
    $items = json_decode($json_content,true);

    //var_dump($items);
    foreach ($items as $key => $value) {
        CheckStockThenUpdateQte($sql,$value,$test);
        //break;
    }

}


function CheckStockThenUpdateQte($sql,$item,$test){
    $query = "SELECT * FROM `item` JOIN `itemcategorybysize` ON  `item`.`Id` = `itemcategorybysize`.`Item_Id`  WHERE `item`.`Id` =".$item["item_id"]  ;
    $error_message = "";
    if($result = $sql->query($query)){
        $row = $result->fetch_assoc();
       // var_dump($row);
        if($item["item_qte_nosize"] > $row["Qte_NOSIZE"] || $item["item_qte_xs"] > $row["Qte_xs"] ||  $item["item_qte_m"] > $row["Qte_m"] || $item["item_qte_s"] > $row["Qte_s"] || $item["item_qte_l"] > $row["Qte_l"] 
                        || $item["item_qte_xl"] > $row["Qte_xl"] || $item["item_qte_xxl"] > $row["Qte_xxl"] || $item["item_qte_xxxl"] > $row["Qte_xxxl"] ){
            
            
            echo "error_qte_".$item["item_id"] ;
            exit();
        }
        
        if($test == 0)
        return true;

        //update the quantities in the database : 
        $query = "UPDATE `itemcategorybysize` SET `Qte_NOSIZE` = ".($row["Qte_NOSIZE"] - $item["item_qte_nosize"])." , 
                    `Qte_xs` = ".($row["Qte_xs"]  - $item["item_qte_xs"])." ,
                    `Qte_m` = ".($row["Qte_m"]  -  $item["item_qte_m"]).",
                    `Qte_s` = ".($row["Qte_s"] - $item["item_qte_s"]).",
                    `Qte_l` = ".($row["Qte_l"]  -$item["item_qte_l"] ).",
                    `Qte_xl` = ".($row["Qte_xl"] - $item["item_qte_xl"]).",
                    `Qte_xxl` = ".($row["Qte_xxl"] - $item["item_qte_xxl"]).",
                    `Qte_xxxl` = ".($row["Qte_xxxl"] - $item["item_qte_xxxl"])." WHERE `Item_Id` = ".$item["item_id"];

        if($sql->query($query)){
            ChangeRefresh();
            return true;
        }else{
            echo "server_error";
            exit();
        }

        
    }

  
}






function ChangeRefresh(){//refresh when a change a happen in the database during the excution of different functions in this script file .
	if(!isset($_COOKIE["LoginSession"])){
        echo "you are not connected .";
        exit();
    }
	$sql = new sql();
	$sql = $sql->connection;
	$auth_id = GetAuthentificationId($sql);

	$query = "UPDATE `refreshwhenchange` SET `Refresh` = 1  WHERE `Authentification_Id` = $auth_id ";
	if($sql->query($query)){
		//the refreshwhenchange has been modified the pages should get a notification that a chang has occured
	}
}



?>