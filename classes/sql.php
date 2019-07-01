<?php
  


//$sql = new sql();

 /**
 * 
 */
 class SQL 
 {
 	private $db_host = "eternal-db.database.windows.net"	;
 	private $db_username = "nabiikaz1995";
	private $db_password = "Eternal-db";
 	private $db_name 	 = "eternal";
 	public $connection ;
 	function __construct()
 	{
 		$this->connection = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name,1433);
		if($this->connection->connect_errno > 0){
		 die('Unable to connect to database [' . $connection->connect_error . ']');
		}

 	}

 	public function Close()
 	{
 		$this->connection->close();
 	}





 }






?>
