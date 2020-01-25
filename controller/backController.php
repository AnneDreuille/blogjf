<?php //contrôleur avec les fonctions pour l'administrateur

//charger les classes
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');

//rediriger vers accueilAdmin
function accueilAdmin(){
	require(__DIR__.'/../view/back/accueilAdmin.php');
}

//ajouter un post
function addPost() { 
	// vérifier que le formulaire a bien reçu les paramètres
	if (!empty($_POST['title']) && !empty($_POST['content'])) {

		$published=0;

		if (isset($_POST['published'])){
			$published=1;
		}

		//créer l'objet
		$postManager= new PostManager();

		//appeler la fonction
		$affectedLines= $postManager->addPost(htmlspecialchars($_POST['title']), nl2br($_POST['content']), $published);
	}
	
	//charger le fichier en vue de l'affichage dans la page html 
	require(__DIR__.'/../view/back/addPost.php');
}

//afficher la liste de tous les posts publiés & non publiés
function managePosts() {
	//créer l'objet
	$postManager= new PostManager();
	
	//appeler la fonction pour le nb total de posts publiés et non publiés
	$nbAllPosts=$postManager->nbAllPosts();

	//définir le nb de titres de posts par page et le nb de pages
	$perPage=4;
	$nbPages= ceil($nbAllPosts/$perPage);

	//vérifier qu'on a bien reçu un n° page (p) en paramètre dans l'url
	if (isset ($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages) {
		$currentPage = ($_GET['p']);
	} else {
		$currentPage =1;
    }

	//appeler la fonction pour afficher la liste de tous les posts 
	$posts= $postManager->listAllPosts($currentPage);

	//charger le fichier en vue de l'affichage dans la page html 
	require(__DIR__.'/../view/back/managePosts.php');  
}

//modifier un post
function updatePost() { 
	//vérifier qu'on a bien reçu un id en paramètre dans l'url
	if (isset($_GET['id']) && $_GET['id']>0) {

		//créer l'objet
		$postManager= new PostManager();

		//appeler la fonction
		$post= $postManager->post($_GET['id']);

		// vérifier que le formulaire a bien reçu les paramètres
		if (!empty($_POST['title']) && !empty($_POST['content'])) {

			$published=0;
			if (isset($_POST['published'])){
				$published=1;
			}

			//créer l'objet
			$postManager= new PostManager();

			//appeler la fonction de cet objet
			$updatePost= $postManager->updatePost(htmlspecialchars($_POST['title']), nl2br($_POST['content']), $published, $_GET['id']);

			//diriger vers la page updatePost et mettre à jour le post
			header('Location: index.php?action=updatePost&id=' .$_GET['id']);
			die();

		} else {
			//charger le fichier en vue de l'affichage dans la page html   
			require(__DIR__.'/../view/back/updatePost.php');   
		} 
	} else {
		throw new Exception('Erreur : pas de chapitre identifié');
	}
}

//supprimer un post
function deletePost() { 
	//créer l'objet
	$postManager= new PostManager();

	//appeler la fonction
	$deletePost= $postManager->deletePost($_GET['id']);
	
	//diriger vers la liste des posts et supprimer le post 
	header('Location: index.php?action=managePosts&id='.$_GET['id']);
	die();
}

//lister les commentaires avec alerte
function listAlertComments() {
	//créer l'objet
	$commentManager= new CommentManager();

	//appeler la fonction de cet objet 
	$listAlertComments= $commentManager->listAlertComments();

	//charger le fichier en vue de l'affichage dans la page html 
	require(__DIR__.'/../view/back/manageComments.php');  
}

//enlever une alerte sur un commentaire
function noAlertComment() {
	//créer l'objet
	$commentManager= new CommentManager();

	//appeler la fonction de cet objet
	$noAlertComment= $commentManager->noAlertComment($_GET['id']);

	//diriger vers la liste des alertes et mettre l'alerte à 0 
	header('Location: index.php?action=listAlertComments&id='.$_GET['id']);
	die();	
}

//modifier un commentaire inapproprié
function updateComment() {
	//vérifier qu'on a bien reçu un id en paramètre dans l'url
	if (isset($_GET['id']) && $_GET['id']>0) {

		//créer l'objet
		$commentManager= new CommentManager();

		//appeler la fonction 
		$comment= $commentManager->comment($_GET['id']);

		//vérifier que le formulaire a bien reçu les paramètres
		if (!empty($_POST['comment'])) {

			//créer l'objet
			$commentManager= new CommentManager();

			//appeler la fonction de cet objet
			$updateComment= $commentManager->updateComment(nl2br($_POST['comment']),$_GET['id']);
			
			//diriger vers la page updateComment et mettre à jour le commentaire
			header('Location: index.php?action=updateComment&id='.$_GET['id']);
			die();
		
		} else {
			//charger le fichier en vue de l'affichage dans la page html   
			require(__DIR__.'/../view/back/updateComment.php');   		
		}
	} else {
		throw new Exception('Erreur : pas de chapitre identifié');
	}
}

//supprimer un commentaire inapproprié
function deleteComment() {
	//créer un objet
	$commentManager= new CommentManager();
	
	//appeler la fonction de cet objet 
	$deleteComment = $commentManager->deleteComment($_GET['id']);

	//diriger vers la liste des alertes et supprimer le commentaire 
	header('Location: index.php?action=listAlertComments&id='.$_GET['id']);
	die();
}