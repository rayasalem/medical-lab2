<?php
class Database 
{
	private static $dbName = 'medicallab' ;  
	private static $dbHost = 'localhost' ;
	private static $dbUsername = 'root'; 
	private static $dbUserPassword = ''; 
	
	private static $conn  = null;
	
	private function __construct() {
		
	}
	
	public static function connect()
	{
	   // One connection through whole application
       if ( self::$conn == null )
       {      
        try 
        {
          self::$conn =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
		  self::$conn->exec("SET NAMES utf8");
		  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$conn;
	}
		
}
?>