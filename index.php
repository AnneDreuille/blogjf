<?php //index routeur sur les fonctions frontController


require_once(__DIR__.'/app/config.php');

//charger les fichiers controllers et leurs fonctions
require_once(__DIR__.'/controller/frontController.php');

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {

	if (isset($_GET['action'])) {

		if ($_GET['action']=='post') { 
			post();
		}
		elseif ($_GET['action']=='book') { 
			book();
		}	
		elseif ($_GET['action']=='listComments') { 
			listComments();
		}
		elseif($_GET['action']=='addComment') { 
			addComment();			
		}
		elseif($_GET['action']=='alertComment') { 
			alertComment();
		}
	}
	//afficher par défaut la liste des posts publiés : page d'accueil listPosts
	else {
		listPosts();	
	}
}
catch(Exception $e) {				
	echo 'Erreur : ' .$e->getMessage();
}