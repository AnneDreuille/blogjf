<?php $title ='Modifier les commentaires'; ?>

<?php ob_start(); ?>

    <div class ="container-fluid">
    
        <h1 class="text-primary">Modifier les commentaires inappropriés</h1>

        <!-- bouton Retour à la page Administration accueilAdmin-->
        <a class="btn btn-primary" href="index.php" role="button">Retour à la page Administration</a><br/><br/>
    
        <p class="text-primary"><strong>Vous pouvez : 
            <ol class="text-primary">
                <li>modifier le texte du commentaire, puis désactiver l'alerte</li>
                <li>désactiver l'alerte (sans modifier le commentaire)</li>
                <li>supprimer complètement le commentaire</li>
            </ol>
            <p class="text-primary">Une fois géré, le commentaire doit disparaître de cette page.</p>
        </strong></p><br/>
                           
        <!-- afficher le commentaire à modifier dans un formulaire prérempli-->
        <form method="post">

            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars ($comment['pseudo']);?>"/><br/>

            <label for="alert">Etat de l'alerte</label>
            <input type="number" id="alert" name="alert" value="<?php echo htmlspecialchars($comment['alert']);?>"/><br/>

            <label for="comment">Commentaire</label>
            <textarea id="comment" name="comment"><?php echo nl2br (strip_tags($comment['comment']));?></textarea><br/>

            <input class="btn btn-warning" type="submit" value="Valider la modification"/>
        </form><br/>
 
        <!-- désactiver l'alerte du commentaire -->
        <form action="index.php?action=noAlertComment&id=<?php echo $comment['id'];?>" method="post">
            <input class="btn btn-success" type="submit" value="Désactiver l'alerte"/>
        </form><br/>

        <!-- supprimer le commentaire -->
        <form action="index.php?action=deleteComment&id=<?php echo $comment['id'];?>" method="post">
            <input class="btn btn-danger" type="submit" value="Supprimer le commentaire"/>
        </form><br/>


        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/> <!-- fin div container -->
   

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');