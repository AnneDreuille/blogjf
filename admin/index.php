<?php //index routeur sur les fonctions backController

//charger le fichier config avec définition des constantes d'accès à la db
require_once(__DIR__.'/../app/config.php');

//charger les fichiers controllers et leurs fonctions
require_once(__DIR__.'/../controller/backController.php');

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {

	if (isset($_GET['action'])) {

		if($_GET['action']=='managePosts') {
			managePosts();
		}
		elseif($_GET['action']=='addPost') {
			addPost();
		}
		elseif($_GET['action']=='updatePost') {
			updatePost();
		}
		elseif($_GET['action']=='deletePost') {
			deletePost();
		}
		elseif($_GET['action']=='listAlertComments') {
			listAlertComments();
		}
		elseif($_GET['action']=='noAlertComment') {
			noAlertComment();
		}
		elseif($_GET['action']=='updateComment') {
			updateComment();
		}
		elseif($_GET['action']=='deleteComment') {
			deleteComment();
		}
	}
	//afficher par défaut la page accueilAdmin
	else {
		accueilAdmin();
	}
}
catch(Exception $e) {				
	echo 'Erreur : ' .$e->getMesssage();
}