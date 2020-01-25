<?php //model

class Manager {
	//se connecter à MySQL + tableau erreurs SQL
	protected function dbConnect() {  
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PSWD, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
    	return $db;
	}
}