<?php //contrôleur avec les fonctions pour utilisateurs (=visiteurs)

//charger les classes
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');

//afficher la liste de tous les posts publiés dans la page d'accueil listPosts
function listPosts() {
	//créer l'objet
	$postManager= new PostManager();
	
	//appeler la fonction pour le nb de posts publiés
	$nbPosts=$postManager->nbPosts();

	//définir le nb de titres de posts par page et le nb de pages
	$perPage=4;
	$nbPages=ceil($nbPosts/$perPage);

	//vérifier qu'on a bien reçu un n° page (p) en paramètre dans l'url
	if (isset ($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages) {
		$currentPage = ($_GET['p']);
	} else {
		$currentPage =1; //afficher la page 1 par défaut
    }

	//appeler les fonctions pour afficher les posts publiés (liste posts et dernier post)
	$posts= $postManager->listPosts($currentPage);
	$lastPost= $postManager->lastPost();

	//charger le fichier en vue de l'affichage dans la page html 
	require(__DIR__.'/../view/listPosts.php');  
}

//afficher le contenu de tous les posts publiés dans la page book 
function book() {
    //créer l'objet
	$postManager= new PostManager();

	//appeler la fonction pour le nb de posts publiés
	$nbPosts= $postManager->nbPosts();

	//vérifier qu'on a bien reçu un n° page (p) en paramètre dans l'url
	if (isset ($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPosts) {
		$currentPage = ($_GET['p']);
	} else {
		$currentPage =1; //afficher la page 1 par défaut
    }

	//appeler la fonction pour afficher tous les posts publiés
	$book= $postManager->book($currentPage);

	//charger le fichier en vue de l'affichage dans la page html 
	require(__DIR__.'/../view/book.php');
}

//afficher un seul post & ses commentaires dans la page post
function post() {
	//vérifier qu'on a bien reçu un id en paramètre dans l'url
	if (isset($_GET['id']) && $_GET['id']>0) {

		//créer les objets
		$postManager= new PostManager();
		$commentManager= new CommentManager();

		//appeler les fonctions de ces objets
		$post= $postManager->post($_GET['id']);
			if (empty($post)){
				throw new Exception('Pas de chapitre existant');
			}
			if ($post['published']==0){
				throw new Exception('Pas de chapitre publié');
			}

		$comments= $commentManager->listComments($_GET['id']);

		//charger le fichier en vue de l'affichage dans la page html 
		require(__DIR__.'/../view/post.php');   
	
	} else {
		//envoyer une exception dans catch en cas d'erreur
		throw new Exception('Pas de chapitre identifié'); 
	}
}

//ajouter un commentaire
function addComment() {
	
	//vérifier qu'on a bien reçu un id en paramètre dans l'url
	if (isset($_GET['id']) && $_GET['id']>0) {

		//vérifier que le formulaire est bien rempli
		if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {

			//créer l'objet
			$commentManager= new CommentManager();
	 		
			//appeler la fonction de cet objet
			$affectedLines= $commentManager->addComment($_GET['id'], htmlspecialchars($_POST['pseudo']), nl2br($_POST['comment']));

			if ($affectedLines===false) {
				throw new Exception("Impossible d'ajouter le commentaire !");
			}
			//diriger vers la page post et ajouter le commentaire 
			else {
				header('Location: index.php?action=post&id='.$_GET['id']);
				die();
			}
		} else {
			throw new Exception('Tous les champs ne sont pas renseignés !');
		}
	} else {
		throw new Exception('Erreur : pas de chapitre identifié');
	}
}

//alerter sur un commentaire inapproprié
function alertComment() {
	//vérifier qu'on a bien reçu un id en paramètre dans l'url
	if (isset($_GET['id']) && $_GET['id']>0) {

		// créer l'objet
		$commentManager= new CommentManager();
		
		// appeler la fonction 
		$alertComment= $commentManager->alertComment($_GET['id']);
		
		//diriger vers la page post et mettre à jour l'alerte qui passe à 1
		header('Location: index.php?action=post&id='.$_GET['idPost'].'&alert=1');
		die();	

	} else {
		throw new Exception('Erreur : pas de chapitre identifié');
	}
}