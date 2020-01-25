<?php $title ='Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <h1 class="text-center page-header text-primary"><strong>"Billet simple pour l'Alaska"<br/>roman de Jean Forteroche</strong></h1>

        <!-- bouton Retour à la page d'accueil et lien vers la page listPosts-->
        <a class="btn btn-lg btn-info" href="index.php" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour à la page d'accueil</a><br/><br/>

        <div class ="row">
            <div class ="col-md-offset-1 col-md-10 col-md-offset-1">

                <p>Bonne lecture de ce chapitre !</p><br/>

                <!-- afficher un chapitre entier -->
                <div>
                    <span><em class="small">Publié le <?php echo $post['postDate_fr'];?></em></span>
                    <h2><?php echo ($post['title']);?></h2>
                    <p class="text-justify"><?php echo nl2br(strip_tags($post['content']));?></p>
                </div><br/>
            </div>
        </div>

        <div class ="row">
            <div class ="col-md-offset-1 col-md-5">

                <div class="well">
                    <!-- formulaire pour laisser un commentaire -->
                    <p>Vous voulez ajouter un commentaire ?</p>
                
                    <form action="index.php?action=addComment&id=<?php echo $post['id'];?>" method="post">
                        <label for="pseudo">Pseudo</label><br/>
                        <input type="text" id="pseudo" name="pseudo"/><br/>

                        <label for="comment">Commentaire</label><br/>
                        <textarea id="comment" name="comment"></textarea><br/>

                        <button class="btn btn-primary btn-success" type="submit">
                            Envoyer <span class="glyphicon glyphicon-send"></span>
                        </button><br/>
                    </form>
                </div>
            </div>

            <div class ="col-md-offset-right-1 col-md-5 well">

                <!-- afficher les derniers commentaires sur ce chapitre -->
                <button class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-comment"></span><br>Commentaires</button><br/>

                <?php
            	foreach ($comments as $data) {
            	?> 
                    <dl> <!-- utilisation d'une liste de descriptions -->
                        <dt><?php echo $data['pseudo'];?>
                        <em class="small text-primary"> - Posté le <?php echo $data['commentDate_fr'];?></em></dt>
                        <dd class="text-justify"><?php echo nl2br(strip_tags($data['comment']));?></dd>
                    </dl>

                    <!-- afficher le bouton pour alerter sur un commentaire inapproprié -->
                    <form action="index.php?action=alertComment&id=<?php echo $data['id'];?>&idPost=<?php echo $data['idPost'];?>" method="post">
                     
                        <button class="btn btn-xs btn-warning" type="submit" id="submit">
                            Signaler ce commentaire comme abusif <span class="glyphicon glyphicon-thumbs-down"></span>                        
                        </button>

                        <!-- afficher le message "alerte bien enregistrée" -->
                        <p class= "text-danger small"><em>
                        <?php 
                            switch ($data['alert']){
                                case '1':
                                echo "Votre alerte a bien été enregistrée !";
                                break;
                                case '0':
                                echo '';
                                break;
                            }
                        ?>
                        </em></p>
                    </form>
                <?php
            	}  
            	?>
            </div>
         </div>
     
    <!-- Bouton back to the top -->
    <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/><br/> <!-- fin container -->


    <!-- bouton Retour à la page d'accueil et lien vers la page listPosts-->
    <a class="btn btn-lg btn-info" href="index.php" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour à la page d'accueil</a><br/><br/>

    <!-- lien vers Espace Administrateur -->
    <div class ="row">
        <div class ="col-md-offset-8 col-md-2 col-md-offset-2 pull-right small">
            <a href="admin/index.php"><em>Espace Administrateur</em></a>
        </div>
    </div>


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/templateHtml.php');