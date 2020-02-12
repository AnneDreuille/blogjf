<?php $title ='Administration du Blog de Jean Forteroche'; ?>
<?php $metaDescription="Accueil Espace Administrateur"; ?>

<?php ob_start(); ?>

    <div class ="container">
        
    	<h1 class="text-primary">Page d'administration du blog de Jean Forteroche</h1><br/>
        
    	<!-- bouton Retour à la page d'accueil listPosts-->
        <a class="btn btn-info" href="../index.php" role="button">Retour à la page d'accueil</a><br/><br/>

        <!-- script pour compteur de visites -->
        <div class ="row">
            <div class ="col-md-5">
                <h4 class="text-center text-primary well">Nombre de visites sur le blog&nbsp;=
                <a href="https://www.compteurdevisite.com" title="compteur de visite pour blog gratuit"><img src="https://counter1.wheredoyoucomefrom.ovh/private/compteurdevisite.php?c=7eqq7klxsu4w7b9bzhlfennsmjm8z98p" border="0" title="compteur de visite pour blog gratuit" alt="compteur de visite pour blog gratuit"></a>
                </h4>
            </div>
        </div>

    	<p>Que voulez-vous faire&nbsp;?</p><br/>
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