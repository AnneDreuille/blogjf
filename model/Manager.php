<?php //model

class Manager {
	//se connecter à MySQL + tableau erreurs SQL
	protected function dbConnect() {  
		$db = new PDO('mysql:host=localhost;dbname=blogjf;charset=utf8','root','', array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
    	return $db;
	}
}