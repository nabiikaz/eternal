<?php

include_once "sql.php";



if(isset($_COOKIE["UserID"]))
{
	//SaveCart has the value of json which has all the info about all the items in the cart :
	if(isset($_POST["SaveCart"])){
		SaveCart($_POST["SaveCart"],$_COOKIE["UserID"]);
	}
	//loading the cart from the database if th LoadCart parameter is set :
	if(isset($_POST["LoadCart"]))
	{
		LoadCart($_COOKIE["UserID"]);
	}

}else
{
	//if the UserID cookie does not exist then we create it and initialize it to a random unique value if it exist then do nothing 
	$UserID = time()+""+rand(1,10000);
	setcookie("UserID",$UserID,time()+2592000,"/");
 	CreatUserID_InDB($UserID);

	if(isset($_POST["SaveCart"])){
		SaveCart($_POST["SaveCart"],$UserID,true);
	}
}



	function CreatUserID_InDB($UserID)
	{
		$sql = new SQL();

		$query = "INSERT INTO `tmpcart` (`UserID`, `JsonContent`) VALUES (".$UserID .", '');";

		if(!$result = $sql->connection->query($query)){
			$sql->Close();
		    die('There was an error running the query [' . $sql->connection->error . ']');
		    return false;
		}

		$sql->Close();
	}









//this script file is for saving the cart selected items in the server with a unique id given to a user when he visits the website;

	function SaveCart($json_content,$UserID,$first_time=false)
	{
		$sql = new SQL();
		/*if first_time is true thats means we need to insert a new row of this new visitor (another explanation : the cookie was not found in the browser which meant  that the visitor is new or the cookie was deleted ):*/
		if($first_time)
			$query = "INSERT INTO `tmpcart` (`UserID`, `JsonContent`) VALUES (".$UserID .", '".$json_content."');";
		else //first_time here is false that means that the UserID Cookie exists in the client browser :
			$query = "UPDATE `tmpcart` SET `JsonContent`='".$json_content."' WHERE `UserID`='".$UserID ."' ;";

		
		echo $query;
		if(!$result = $sql->connection->query($query)){
			$sql->Close();
		    die('There was an error running the query [' . $sql->connection->error . ']');
		    return false;
		}

		$sql->Close();


	}


//this function will load the cart json from the data base
	function LoadCart($UserID)
	{
		$sql = new SQL();

		$query = "SELECT `JsonContent` FROM `tmpcart` WHERE `UserID` LIKE ".$UserID ." ;";

		if(!$out = $sql->connection->query($query)){
			$sql->Close();
		    die('There was an error running the query [' . $sql->connection->error . ']');
		    return false;
		}
		while($row = $out->fetch_assoc()){
    		echo $row['JsonContent'] ;

    		return ;
		}
		
	}





?>