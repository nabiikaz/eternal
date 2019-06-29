<?php


include "sql.php";


$sql = new sql();


$query = "SELECT `Id`,`ClientFullName`,	`ResidenceCity`,`Phone`,`Email` FROM `user` WHERE `ClientFullName` LIKE '%i%'";

if(!$out = $sql->connection->query($query)){
			$sql->Close();
		    die('There was an error running the query [' . $sql->connection->error . ']');
		    return false;
}
echo "<pre>";
while($row = $out->fetch_assoc()){

    		var_dump($row);
}

echo "</pre>";



?>