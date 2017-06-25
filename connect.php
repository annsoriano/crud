<?php
class db{
	public static $conn;

	private function __construct(){}

	private function __clone(){}

	public static function getInstance(){
		try{
			self::$conn= new PDO('mysql:host=localhost;dbname=trial', 'root','');
			return self::$conn;
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
}
?>