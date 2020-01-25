<?php $title ='Administration du Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

    <div class ="container-fluid">
    
    	<h1>Page d'administration du blog de Jean Forteroche</h1><br/>
        
    	<!-- bouton Retour à la page d'accueil listPosts-->
        <a class="btn btn-info" href="../index.php" role="button">Retour à la page d'accueil</a><br/><br/>

        <!-- script pour compteur de visites -->
        <div class ="row">
            <div class="col-md-4">
                <h4 class="text-center text-primary well">Nombre de visites sur le blog =
                <script src="http://www.abcompteur.com/cpt/?code=6/46/20043/0/1&ID=43497129327"></script>
                </h4>
            </div>
        </div><br/>


    	<p>Que voulez-vous faire ?</p><br/>
        <!-- accès aux pages admin -->

        <div class ="row">
            <div class="col-md-offset-1 col-md-3">
                <ul class="list-group">
                	<li class="list-group-item"><a href="index.php?action=addPost">Ajouter un nouveau chapitre</a></li>
                
                	<li class="list-group-item"><a href="index.php?action=managePosts">Gérer les chapitres</a></li>

                	<li class="list-group-item"><a href="index.php?action=listAlertComments">Gérer les commentaires</a></li>
                </ul>
            </div>
        </div>
    </div>

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');