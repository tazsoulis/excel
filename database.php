<?php
class Database {
	private $conn;
	private $host;
	private $user;
	private $password;
	private $baseName;
	
	function __construct($params=array()) {
		$this->conn = false;
		$this->host = 'localhost'; 
		$this->user = 'root'; 
		$this->password = ''; 
		$this->baseName = 'project1'; 
		$this->connect();
	}

	function connect() {
		if (!$this->conn) {
			$this->conn = mysql_connect($this->host, $this->user, $this->password);	
			mysql_select_db($this->baseName, $this->conn); 
			mysql_set_charset('utf8',$this->conn);
			if (!$this->conn) {
				$this->status_fatal = true;
				echo 'Connection db failed';
				die();
			} 
			else {
				$this->status_fatal = false;
			}
		}
		return $this->conn;
	}
 
	function getAll($query) { // getAll function: when you need to select more than 1 line in the database
		$cnx = $this->conn;
		if (!$cnx || $this->status_fatal) {
			echo 'GetAll -> Connection db failed';
			die();
		}
		mysql_query("SET NAMES 'utf8'");
		$cur = mysql_query($query);
		$return = array();
		while($data = mysql_fetch_assoc($cur)) { 
			array_push($return, $data);
		} 
		return $return;
	}
	
	function execute($query,$use_slave=false) {  // execute function: to use INSERT or UPDATE
		$cnx = $this->conn;
		if (!$cnx||$this->status_fatal) {
			return null;
		}
		$cur = @mysql_query($query, $cnx);
		if ($cur == FALSE) {
			$ErrorMessage = @mysql_last_error($cnx);
			$this->handleError($query, $ErrorMessage);
		}
		else {
			$this->Error=FALSE;
			$this->BadQuery="";
			$this->NumRows = mysql_affected_rows();
			return;
		}
		@mysql_free_result($cur);
	}

}