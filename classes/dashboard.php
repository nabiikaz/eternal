<?php
	
include_once "sql.php";
/*
if(!isset($_POST["item_id"]) && isset($_POST["item_qte_by_size"]) && isset($_POST["item_unit_price"]) && isset($_POST["item_name"]) && isset($_POST["gender"]) && isset($_POST["item_category"]) && isset($_FILES["file"]) )
	Add_item_to_db($_POST["item_name"],$_POST["item_unit_price"],$_POST["item_qte_by_size"],$_POST["gender"],$_POST["item_category"],$_FILES["file"]);

else if(isset($_POST["item_id"])){
	if(isset($_POST["item_qte_by_size"]) && isset($_POST["item_unit_price"]) && isset($_POST["item_name"]) && isset($_POST["gender"]) && isset($_POST["item_category"])  ){
			Update_item($_POST["item_name"],$_POST["item_unit_price"],$_POST["item_qte_by_size"],$_POST["gender"],$_POST["item_category"]);
		
	}
}

*/

if(isset($_POST["confirm_purchase"])){
	confirm_purchase();





	exit();
}

function confirm_purchase(){
	$sql = new sql();
	$sql = $sql->connection;

	$date = new DateTime(); 
    $confirmation_Date = $date->format('Y-m-d');

	$purchase_qr = $_POST["confirm_purchase"];

	$query = "SELECT * FROM `purchases` WHERE `Purchase_QrCode_content` LIKE '$purchase_qr'";
	
	$confirmation_query = "UPDATE `purchases` SET `Payment_confirmation` = 1 , `Payment_confirmation_date` = '$confirmation_Date'   WHERE `Purchase_QrCode_content` LIKE '$purchase_qr' ";

	if($result = $sql->query($query)){
		if($result->num_rows == 0 || $result->num_rows >1  ){
			
			echo "<div class='alert alert-danger'><span >Confiramation  :  Qr in Not Valid</span></div>";
			
			return;
		}
		$row = $result->fetch_assoc();
		if($row["Payment_confirmation"] == 1){
			echo "<div class='alert alert-warning'><span >Confiramation  :  This Purchase Is Already Confirmed</span></div>";
			return;
		}

		if($sql->query($confirmation_query)){
			echo "<div class='alert alert-success'><span >Confiramation  :  This Purchase Has Been Confirmed</span></div>";
			
			
		}

	}

}





//Add An item From the DashBoard TO DB ;
if(isset($_POST["item_qte_by_size"]) && isset($_POST["item_unit_price"]) && isset($_POST["item_name"]) && isset($_POST["gender"]) && isset($_POST["item_category"]) ){
	if(isset($_POST["item_id"]))
		Update_item($_POST["item_name"],$_POST["item_unit_price"],$_POST["item_qte_by_size"],$_POST["gender"],$_POST["item_category"]);
	else if( isset($_FILES["file"]))
		Add_item_to_db($_POST["item_name"],$_POST["item_unit_price"],$_POST["item_qte_by_size"],$_POST["gender"],$_POST["item_category"],$_FILES["file"]);

	exit();
	
}




if(isset($_POST["blockuser"])){ //blockuser has the value (referece of the user of which we are going to block)

/*	if($_POST["blockuser"] == "01234")
		echo "Error";
	echo "Done";*/
	if(BlockAccount(1,$_POST["blockuser"]))
		echo "Done";
	else 
		echo "Error";
	
	exit();
}

if(isset($_POST["unblockuser"])){ //blockuser has the value (referece of the user of which we are going to block)

/*	if($_POST["unblockuser"] == "01234")
		echo "Error";
	echo "Done";*/

	if(BlockAccount(0,$_POST["unblockuser"]))
		echo "Done";
	else 
		echo "Error";
	
	exit();
}


if(isset($_POST["deleteuser"])){//blockuser has the value (referece of the user of which we are going to delete)
	

	if(DeleteAccount($_POST["deleteuser"]))
		echo "Done";
	else
		echo "Error";
	
	exit();

}


if(isset($_POST["manager"])){

	switch ($_POST["manager"]) {
		case 'accounts_manager':
			if(isset($_POST["option"]) && isset($_POST["search_query"])){
				AccountSearch();
			}

			break;
		
		default:
			# code...
			break;
	}

	exit();
	


}



function BlockAccount($block_unblock,$userid){
	$sql = new sql();
	$sql= $sql->connection;
	
	$query = "UPDATE `authentification` AS T1 SET `Blocked`=$block_unblock WHERE `Id` = 
					  (SELECT `Authentification_Id` FROM  `user` AS T2 WHERE T1.`Id` = T2.`Authentification_Id` AND T2.`Id` = $userid  AND `AdminPrivilege` = 0) ";

	if($sql->query($query)){
		if($block_unblock == 1) 
			LoggingOutUser($userid);
		return true;
	}else 
		return false;
	
	
}


function DeleteAccount($userid){
	$sql = new sql();
	$sql = $sql->connection;

	$query = "DELETE FROM `authentification` WHERE `Id` = 
					(SELECT `Authentification_Id` FROM  `user` AS T2 WHERE `authentification`.`Id` = T2.`Authentification_Id` AND T2.`Id` = $userid  AND `AdminPrivilege` = 0) ";
	echo $query;
	if($sql->query($query)){
		LoggingOutUser($userid);
		return true;
	}
	else 
		return false;
}

function LoggingOutUser($userid){//logging out a certain user from his account:
	$sql = new sql();
	$sql = $sql->connection;

	$query = "UPDATE `session` SET `Expired` = 0 , `Status` = 0 WHERE `Authentification_Id` = 
			 (SELECT `Authentification_Id` FROM `authentification` JOIN `user` ON `authentification`.`Id` = `user`.`Authentification_Id` WHERE `user`.`Id` = $userid )";

	if($sql->query($query)){
		//echo $query;

		ChangeRefresh($userid);
	}
	//echo $query;

}
//AccountSearch is the function which is responsible for searching certain user accounts 

function AccountSearch(){ //this function requires the option and search_query POST keys to be set ;
	//echo "option =".$_POST["option"] ."\n search_query = ".$_POST["search_query"];

	$option = $_POST["option"];
	$search_query = $_POST["search_query"];
	$execute_bool = false;

	$big_query = "(SELECT * FROM (SELECT `Authentification_Id` as `T1.Authentification_Id` ,`Email`,`Blocked`,`ClientFullName`,`ResidenceCity`,`Phone`,`user`.`Id` FROM `user`,`authentification` WHERE `user`.`Authentification_Id` = `authentification`.`Id`) AS t1 LEFT JOIN (SELECT `Authentification_Id`,`Status`,`Expired` FROM `session`) AS t2 ON `T1.Authentification_Id` = t2.`Authentification_Id` ) AS T3";
	switch ($option) {
		case 'All':
			$query = "SELECT * FROM $big_query WHERE  `ClientFullName` LIKE '%".$search_query."%'
													OR `ResidenceCity` LIKE '%".$search_query."%' OR  `Phone` LIKE '%".$search_query."%' 
													OR `Email` LIKE '%".$search_query."%' ;";
		///	echo $query;
													
			ExecuteQueryAndPrintAccountsResult($query);
			break;

		case 'Username':
			$query = "SELECT * FROM $big_query WHERE  `ClientFullName` LIKE '%".$search_query."%' ;";
			
			ExecuteQueryAndPrintAccountsResult($query);
			//$execute_bool = true;

			break;

		case 'Address':
			$query = "SELECT * FROM $big_query WHERE  `ResidenceCity` LIKE '%".$search_query."%';";
			ExecuteQueryAndPrintAccountsResult($query);
			break;

		case 'Phone':
			$query = "SELECT * FROM $big_query WHERE  `Phone` LIKE '%".$search_query."%' ;";
			ExecuteQueryAndPrintAccountsResult($query);
			break;

		case 'Email':
			$query = "SELECT * FROM $big_query WHERE  `Email` LIKE '%".$search_query."%' ;";
			ExecuteQueryAndPrintAccountsResult($query);
			break;
		
		default:
			# code...
			break;


	}

	

	

	//echo " query =".$query;











	/*echo '<tr class="user_row" id="098765">
        <th style="width: 10px;" class="text-center" ><input type="checkbox" class="checkbox_select"></th>
        <th>Test User</th>
        <th>Oran</th>
        <th>0555655123</th>
        <th>nabizaki@hotmail.com</th>
        <th class="connection_status_th">Off</th>	
        <th style="width: 10px;" class="danger text-center block_th">Yes</th>
        

        
      </tr>';*/

}




function ExecuteQueryAndPrintAccountsResult($query){
	$sql = new sql();
	
		if(!$out = $sql->connection->query($query)){
			$sql->Close();
		    die('There was an error running the query [' . $sql->connection->error . ']');
		    return false;
		}


		while($row = $out->fetch_assoc()){
			if($row["Status"] == 1)
				$Status = "Online";
			else 
				$Status = "Offline";

			if($row["Blocked"] == 1)
				$Blocked = "Yes";
			else 
				$Blocked = "NO";


	    		echo '<tr class="user_row" id="'.$row["Id"].'">
	        <th style="width: 10px;" class="text-center" ><input type="checkbox" class="checkbox_select"></th>
	        <th>'.$row["ClientFullName"].'</th>
	        <th>'.$row["ResidenceCity"].'</th>
	        <th>'.$row["Phone"].'</th>
	        <th>'.$row["Email"].'</th>
	        <th class="connection_status_th">' . $Status . '</th>	
	        <th style="width: 10px;" class="danger text-center block_th">'. $Blocked .'</th>
	        

	        
	      </tr>';
		}

	$sql->Close();
}

function Add_item_to_db($item_name,$item_unit_price,$item_qte_by_size,$gender,$item_category,$file){

	$img_filename =  md5(mt_rand(0,123456).mt_rand(0,time()).mt_rand(0,123456));
	$exploded_filename = explode(".",$_FILES["file"]["name"]);
	$file_type = $exploded_filename[count($exploded_filename)-1];
//	echo $file_type;
	$img_filename .=".".$file_type;
	//echo $img_filename;
	move_uploaded_file($_FILES["file"]["tmp_name"],explode("classes",dirname(__FILE__))[0] ."/img/items/".$img_filename);


	$sql = new sql();
	$sql = $sql->connection;
	    $date = new DateTime(); 
	$AddDate = $date->format('Y-m-d');

	$gender = explode("stock-item-",$gender)[1];
	$item_discount = 0;
	$item_brand = "N/A";
	if(isset($_POST["item_brand"]) && isset($_POST["item_discount"])){
		$item_discount  = 0;
		if($_POST["item_discount"] <= 100 && $_POST["item_discount"] >=0)
			$item_discount  = $_POST["item_discount"];
			
		$item_brand 	= $_POST["item_brand"];
		//var_dump($_POST);
	}
	$query = "INSERT INTO `eternal`.`item` (`Name`, `UnitPrice`, `AddDate`, `Gender`, `ImageFileName`,`Brand`,`Promotion_%`) VALUES
								 ('$item_name', '$item_unit_price', '$AddDate', '$gender',  '$img_filename','$item_brand',$item_discount);";

    if($sql->query($query)){
		$quatity_by_size = explode(",",$item_qte_by_size);
		$query = "INSERT INTO `eternal`.`itemcategorybysize` (`Item_Id`, `Caterogy`, `Qte_NOSIZE`, `Qte_xs`, `Qte_s`, `Qte_m`, `Qte_l`, `Qte_xl`, `Qte_xxl`, `Qte_xxxl`)
							 VALUES ($sql->insert_id, '$item_category', ".$quatity_by_size[0].", ".$quatity_by_size[1].", ".$quatity_by_size[2].", ".$quatity_by_size[3].", ".$quatity_by_size[4].", ".$quatity_by_size[5].", ".$quatity_by_size[6].", ".$quatity_by_size[7].");";
        if($sql->query($query)){
			echo "Item Inserted";
			ChangeRefresh();
			exit();
		}

		ChangeRefresh();
			exit();


	}
	else
	echo "Error";


}


function Update_item($item_name,$item_unit_price,$item_qte_by_size,$gender,$item_category){
		
	$item_id =$_POST["item_id"];
	if(isset($_FILES["file"])){
		$img_filename =  md5(mt_rand(0,123456).mt_rand(0,time()).mt_rand(0,123456));
		$exploded_filename = explode(".",$_FILES["file"]["name"]);
		$file_type = $exploded_filename[count($exploded_filename)-1];
		echo $file_type;
		$img_filename .=".".$file_type;
		//echo $img_filename;
		move_uploaded_file($_FILES["file"]["tmp_name"],explode("classes",dirname(__FILE__))[0] ."/img/items/".$img_filename);

		$img_filename = " ,  `ImageFileName`= '$img_filename' ";
	}else if(isset($_POST["nofile"]))
		$img_filename = "";


	$item_discount_brand = "";
	
	if(isset($_POST["item_brand"]) && isset($_POST["item_discount"])){
		//$item_discount  = " ,`Promotion_%` = ".$_POST["item_discount"];
		$item_discount_brand 	= " , `Brand` = '".$_POST["item_brand"]."' ,`Promotion_%` = ";
		if($_POST["item_discount"] <= 100 && $_POST["item_discount"] >=0)
			$item_discount_brand.= $_POST["item_discount"];
		else  
			$item_discount_brand.= 0;

		//var_dump($_POST);
	}	

	$sql = new sql();
	$sql = $sql->connection;
	    $date = new DateTime(); 
	$AddDate = $date->format('Y-m-d');

	$gender = explode("stock-item-",$gender)[1];	
	$query = "UPDATE `eternal`.`item` set `Name` = '$item_name' , `UnitPrice` = '$item_unit_price' $img_filename $item_discount_brand WHERE `Id` = $item_id ;";
	echo $query;
								 

    if($sql->query($query)){
		$quatity_by_size = explode(",",$item_qte_by_size);
		$query = "UPDATE `eternal`.`itemcategorybysize` SET  `Caterogy` = '$item_category' , `Qte_NOSIZE` = ".$quatity_by_size[0].", `Qte_xs` = ".$quatity_by_size[1].", `Qte_s` = ".$quatity_by_size[2].", `Qte_m` = ".$quatity_by_size[3].", `Qte_l` = ".$quatity_by_size[4].", `Qte_xl` = ".$quatity_by_size[5].", `Qte_xxl` = ".$quatity_by_size[6].", `Qte_xxxl` = ".$quatity_by_size[7]." 
							WHERE `item_Id` = $item_id ";
        if($sql->query($query)){
			echo "Item Updated";
			ChangeRefresh();
			exit();
		}

		ChangeRefresh();
		exit();


	}
	else
	echo "Error";
	echo $query;


}

function ChangeRefresh($userid=""){//when a change occured on the items in the database then make all pages that browse item make a quick refresh
	
	if($userid != "")
		$userid = "WHERE `Authentification_Id` = (SELECT `Authentification_Id` FROM `authentification` JOIN `user` ON `authentification`.`Id` = `user`.`Authentification_Id` WHERE `user`.`Id` = $userid )";
	
	$sql = new sql();
	$sql = $sql->connection;

	$query = "UPDATE `refreshwhenchange` SET `Refresh` = 1  $userid ";
	if($sql->query($query)){
		//the refreshwhenchange has been modified the pages should get a notification that a chang has occured
	}
}

?>