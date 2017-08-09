<?php
require_once("base.inc.php");

class DB
{
    // Connection parameters 
	var $host = DATABASE_HOST;
    var $user = DATABASE_USER_NAME;
    var $password = DATABASE_PASSWORD;
    var $database = DATABASE_NAME;

    var $persistent = false;

	// Database connection handle 
    var $conn = NULL;

    // Query result 
    var $result = false;

	// function DB($host, $user, $password, $database, $persistent = false)
    function DB()
    {
   	
	}

    function open()
    {
        
		try{
			$db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8mb4', $this->user, $this->password);
		}catch(PDOException $ex)
		{
			echo "Error in connecting to DB";
			header("Location: error.html");
		}
		
        return $db;
    }

    function close()
    {
        return (@mysql_close($this->conn));
    }

    function error()
    {
        return (mysql_error());
    }

    /*function query($sql = '')
    {
        $this->result = @mysql_query($sql, $this->conn);
		return ($this->result != false);
    }*/

    function affectedRows()
    {
        return (@mysql_affected_rows($this->conn));
    }

    function numRows()
    {
        return (@mysql_num_rows($this->result));
    }
	function fieldName($field)
    {
       return (@mysql_field_name($this->result,$field));
    }
	 function insertID()
    {
        return (@mysql_insert_id($this->conn));
    }
    
    function fetchObject()
    {
        return (@mysql_fetch_object($this->result));
    }

    function fetchArray()
    {
        return (@mysql_fetch_array($this->result, MYSQL_BOTH));
    }

    function fetchAssoc()
    {
        return (@mysql_fetch_assoc($this->result));
    }

    function freeResult()
    {
        return (@mysql_free_result($this->result));
    }
}
?>
