<?php
  


//$sql = new sql();

 /**
 * 
 */
 class SQL 
 {
 	private $db_host = "localhost"	;
 	private $db_username = "root";
	private $db_password = "";
 	private $db_name 	 = "eternal";
 	public $connection ;
 	function __construct()
 	{
 		$this->connection = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
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