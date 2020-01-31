<?php //model requêtes SQL sur la table comments
require_once(__DIR__.'/Manager.php');

class CommentManager extends Manager {
	
	//insérer un commentaire sur un post dans la table comments
	public function addComment($idPost,$pseudo,$comment) {
		$db= $this->dbConnect();

		$req = $db->prepare('INSERT INTO comments (idPost,pseudo,comment,commentDate,alert) 
			VALUES (?,?,?,NOW(),?)');

		return $req->execute(array($idPost,$pseudo,$comment,0));
	}

	//récupérer les commentaires associés à un post via son id
	public function listComments($idPost) {
		$db= $this->dbConnect();
		
	    $req = $db->prepare('SELECT id, idPost, pseudo,comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%i\') AS commentDate_fr, alert FROM comments WHERE idPost=? ORDER BY commentDate DESC LIMIT 5');
	    
	    $req->execute(array($idPost));
	    return $req->fetchAll();
	}	

	//ajouter une alerte sur un commentaire inapproprié en fonction de son id
	public function alertComment($id) {
		$db= $this->dbConnect();

		$req = $db->prepare('UPDATE comments SET alert=1 WHERE id=?');

		return $req->execute(array($id));
	}

	//BACK END

	//récupérer les commentaires avec une alerte
	public function listAlertComments() {
		$db= $this->dbConnect();
		
	    $req = $db->prepare('SELECT id,idPost, pseudo,comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%i\') AS commentDate_fr,alert FROM comments WHERE alert=1');
	   
	   	$req->execute();
	    return $req->fetchAll();
	}	

	//récupérer 1 commentaire en fonction de son id
	public function comment($id) {
		$db= $this->dbConnect();
		
	    $req = $db->prepare('SELECT id, idPost, pseudo,comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%i\') AS commentDate_fr, alert FROM comments WHERE id=?');
	    
	    $req->execute(array($id));
	    return $req->fetch();
	}	

	//mettre à jour un commentaire en fonction de son id
	public function updateComment($comment, $id) {
		$db= $this->dbConnect();

		$req = $db->prepare('UPDATE comments SET comment=? WHERE id=?');

		return $req->execute(array($comment, $id));
	}

	//supprimer une alerte sur un commentaire en fonction de son id
	public function noAlertComment($id) {
		$db= $this->dbConnect();

		$req = $db->prepare('UPDATE comments SET alert=0 WHERE id=?');

		return $req->execute(array($id));
	}

	//supprimer un commentaire en fonction de son id
	public function deleteComment($id) {
		$db= $this->dbConnect();

		$req = $db->prepare('DELETE FROM comments WHERE id=?');

		return $req->execute(array($id));
	}
}