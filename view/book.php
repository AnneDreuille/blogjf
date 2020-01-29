<?php $title ='Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <h1 class="text-center page-header text-primary"><strong>"Billet simple pour l'Alaska"</strong><p><img src="public/images/plumeBleue.jpg" alt="favicon plume"/></p>
        <p>roman de Jean Forteroche</p></h1>

        <!-- bouton Retour à la page d'accueil et lien vers la page listPosts-->
        <a class="btn btn-lg btn-info" href="index.php" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour à la page d'accueil</a><br/><br/>

        <p>Bonne lecture !</p><br/>

        <!-- afficher tous les chapitres publiés avec pagination -->
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                <h2><?php echo ($book['title']) ;?></h2> 
                <p class="text-justify"><?php echo nl2br(strip_tags($book['content'])) ;?></p>
             </div>
        </div><br/>

        <!-- afficher n° page en cours sur nbPosts + icône avant et arrière avec liens -->
        <div class="text-center">
            <?php
            $next=$currentPage+1;
            $previous=$currentPage-1;
            
            if ($currentPage >1){
                echo '<a class="glyphicon glyphicon-backward" href="index.php?action=book&p='.$previous.'"> </a> ';
            } 
            echo $currentPage .' sur ' .$nbPosts.' ';

            if ($currentPage<$nbPosts){
                echo '<a class="glyphicon glyphicon-forward" href="index.php?action=book&p='.$next.'"> </a>';
            }
            ?>
        </div>  
            
    <!-- Bouton back to the top -->
    <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/><br/> <!-- fin container -->

    <!-- bouton Retour à la page d'accueil et lien vers la page listPosts-->
    <a class="btn btn-lg btn-info" href="index.php" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour à la page d'accueil</a><br/><br/>

    <!-- lien vers Espace Administrateur -->
    <div class ="row">
        <div class ="col-md-offset-8 col-md-2 col-md-offset-2 pull-right small">
            <a href="admin/index.php" class="font-italic">Espace Administrateur</a>
        </div>
    </div>

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/templateHtml.php');