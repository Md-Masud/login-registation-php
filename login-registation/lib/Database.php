<?php

    class Database
    {
        
    	public   $host = 'localhost'; //HOST NAME.
        public $db_name = 'regis'; //Database Name
        public $db_username = 'root'; //Database Username
        public $db_password = ''; //Database Password
        public $pdo;
    	public function __construct()
    	{
    		if(!isset($this->pdo))
    		{

    		try {
    			  $link = new PDO('mysql:host='. $this->host .';dbname='.$this->db_name, $this->db_username, $this->db_password);
    			 $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			//$link->exec("SET_CHARACTER SER utf8");
    			$this->pdo=$link;
    		} catch (PDOException $e) {
    			die("Database cannection fail".$e->getMessage());
    			
    		}
          }
    	}
    }
       

?>