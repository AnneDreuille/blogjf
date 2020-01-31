<?php //model requêtes SQL sur la table posts (=chapitres du roman)
require_once(__DIR__.'/Manager.php');

class PostManager extends Manager {

	//récupérer le nombre de posts publiés
	public function nbPosts() {
		$db= $this->dbConnect();
        
		$req = $db->prepare('SELECT COUNT(id) AS nbPosts FROM posts WHERE published=1');

		$req->execute();
		return $req->fetchColumn(); //fetchColumn pour n'avoir qu'1 col, donc qu'1 valeur
	}

	//récupérer les posts publiés
	public function listPosts($currentPage) {
		$db= $this->dbConnect();
	
		//définir le nb de titres de post affiché par page
		$perPage=4;

		//limiter la requête pour l'affichage avec pagination
		$req = $db->prepare('SELECT id,title,content, DATE_FORMAT(postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr, DATE_FORMAT(updateDate, "%d/%m/%Y à %Hh%i") AS updateDate_fr, published FROM posts WHERE published=1 ORDER BY postDate ASC LIMIT '.(($currentPage-1)*$perPage).','.$perPage.'');
		
		$req->execute();
		return $req->fetchAll();
	}

	//récupérer le dernier post publié
	public function lastPost() {
		$db= $this->dbConnect();
		  
    	$req=$db->prepare('SELECT id, title, content, DATE_FORMAT(postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr, DATE_FORMAT(updateDate, "%d/%m/%Y à %Hh%i") AS updateDate_fr FROM posts WHERE published=1 ORDER BY id DESC LIMIT 1');

    	$req->execute();
    	return $req->fetch();
	}

	//récupérer les posts publiés pour les afficher tous avec pagination
	public function book($currentPage) {
		$db= $this->dbConnect();
	
        //définir le nombre de posts souhaité par page
        $perPage=1;
        
        //limiter la requête pour l'affichage avec pagination
		$req = $db->prepare('SELECT id,title,content, DATE_FORMAT(postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr, DATE_FORMAT(updateDate, "%d/%m/%Y à %Hh%i") AS updateDate_fr, published FROM posts WHERE published=1 ORDER BY postDate ASC LIMIT '.(($currentPage-1)*$perPage).','.$perPage.'');
		
		$req->execute();
	    return $req->fetch();
	}
	
	//récupérer un post précis en fonction de son id
	public function post($id) {
		$db= $this->dbConnect();
		  
    	$req=$db->prepare('SELECT id, title, content, DATE_FORMAT(postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr, DATE_FORMAT(updateDate, "%d/%m/%Y à %Hh%i") AS updateDate_fr, published FROM posts WHERE id=?');
	    
	    $req->execute(array($id));
	    return $req->fetch();    
	}

	//BACK END

	//insérer un nouveau post dans la table posts
	public function addPost($title, $content, $published) {
		$db= $this->dbConnect();

		$req = $db->prepare('INSERT INTO posts (title, content, postDate, updateDate, published) VALUES (?,?,NOW(),NOW(),?)');

		return $req->execute(array($title,$content,$published));
	}

	//récupérer le nombre de posts publiés et non publiés
	public function nbAllPosts() {
		$db= $this->dbConnect();
        
		$req = $db->prepare('SELECT COUNT(id) AS nbAllPosts FROM posts');

		$req->execute();
		return $req->fetchColumn(); //fetchColumn pour n'avoir qu'1 col, donc qu'1 donnée
	}

	//récupérer tous les posts publiés & non publiés
	public function listAllPosts($currentPage) {
		$db= $this->dbConnect();
	
		//définir le nb de titres de post affiché par page
		$perPage=4;

		//limiter la requête pour l'affichage avec pagination
		$req = $db->prepare('SELECT id,title,content, DATE_FORMAT(postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr, DATE_FORMAT(updateDate, "%d/%m/%Y à %Hh%i") AS updateDate_fr, published FROM posts ORDER BY postDate LIMIT '.(($currentPage-1)*$perPage).','.$perPage.'');
		
		$req->execute();
		return $req->fetchAll();
	}

	//mettre à jour un post de la table posts en fonction de son id
	public function updatePost($title, $content, $published, $id) {
		$db= $this->dbConnect();

		$req = $db->prepare('UPDATE posts SET title=?, content=?, updateDate=NOW(), published=? WHERE id=?');

		return $req->execute(array($title, $content, $published, $id));
	}

	//supprimer un post en fonction de son id
	public function deletePost($id) {
		$db= $this->dbConnect();

		$req = $db->prepare('DELETE FROM posts WHERE id=?');

		return $req->execute(array($id));
	}
}