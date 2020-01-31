<?php $title ='Blog de Jean Forteroche'; ?>
<?php $metaDescription="Jean Forteroche publie son premier roman en ligne : vous pouvez lire les chapitres publiés et donnez vos commentaires."; ?>

<?php ob_start(); ?> <!--définit le début de la variable $content dans templateHtml body-->

    <div class="container-fluid">

        <h1 class="text-center page-header text-primary"><img src="public/images/plumeBleue.jpg" alt="favicon plume"/><strong>  Bienvenue sur le blog de Jean Forteroche&nbsp;!</strong></h1><br/>

        <div class ="row">
            <div class ="col-md-offset-1 col-md-2 text-center">
                <!-- afficher la photo de la couverture du roman -->
                <img src="public/images/couvertureAlaska.jpg" alt="couverture Alaska" class="img-thumbnail"/>
            </div>

            <div class ="col-md-5">
                <!-- afficher le texte d'intro -->
                <p class ="text-center well">Le titre de mon livre en cours d'écriture est :<br/>
                "Billet simple pour l'Alaska".<br/><br/>
                Je publie les chapitres au fur et à mesure et vous pouvez donner votre avis en laissant un commentaire !<br/><br/>
                Ci-dessous un extrait du dernier chapitre écrit...</p>
            </div>

             <div class ="col-md-3 col-md-offset-1">
                <div class="well small">
                    <!-- ajouter la bio de l'auteur -->
                    <img src="public/images/bio.jpg" alt="bio" class="img-thumbnail pull-right"/>
                    <p>Professeur de lettres à Montréal, Jean Forteroche est passionné par le Grand Nord et a effectué plusieurs voyages en Alaska, d'où l'idée d'écrire son premier roman "Billet simple pour l'Alaska".</p>
                </div>
            </div> 
        </div><br/>

        <div class ="row">
            <div class ="col-md-7 col-md-offset-1">
                <!-- afficher l'extrait du dernier post publié -->
                <div>
                    <span class="small font-italic text-primary">Publié le <?php echo ($lastPost['postDate_fr']);?></span>
                    <h2><?php echo ($lastPost['title']);?></h2>
                    <p class="text-justify"><?php echo nl2br(substr(strip_tags($lastPost['content']),0,700));?> ...</p>
                </div><br/>
                
                <!-- bouton lire la suite et lien vers page post-->
                <a class="btn btn-lg btn-info" href="index.php?action=post&id=<?php echo ($lastPost['id']);?>" role="button">Lire la suite du chapitre <span class="glyphicon glyphicon-circle-arrow-right"></span></a><br/><br/>

            </div><br/>

            <div class ="col-md-3 col-md-offset-1">
                <div class="well">
                    <!-- afficher la liste des posts déjà publiés -->
                    <p class="text-center">Liste des chapitres publiés</p>
                
                    <?php
                    foreach ($posts as $data) { 
                    ?>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info"><a href="index.php?action=post&id=<?php echo $data['id'];?>">
                            <?php echo ($data['title']);?><span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>

                    <!-- afficher n° page en cours sur nbPages + icône avant et arrière avec liens --> 
                    <div class="text-center">
                        <?php
                        $next=$currentPage+1;
                        $previous=$currentPage-1;

                        if ($currentPage >1){
                            echo '<a class="glyphicon glyphicon-backward" href="index.php?p='.$previous.'" title="bouton arrière"></a>';
                        } 
                        echo ' '.$currentPage.' sur '.$nbPages.' ';

                        if ($currentPage<$nbPages){
                         echo '<a class="glyphicon glyphicon-forward" href="index.php?p='.$next.'" title="bouton avant"></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-md-7 col-md-offset-1">
                <!-- bouton lire le roman et lien vers page book-->
                <a class="btn btn-lg btn-success" href="index.php?action=book" role="button">Lire le roman <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
            </div>
        </div><br/><br/>


        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>
  
    </div><br/><br/>

    <!-- lien vers Espace Administrateur -->
    <div class ="row">
        <div class ="col-md-offset-8 col-md-2 col-md-offset-2 pull-right small">
            <a href="admin/index.php" class="font-italic">Espace Administrateur</a>
        </div>
    </div>


<?php $content=ob_get_clean();?>  <!--définit la variable $content dans templateHtml body-->
<?php require(__DIR__.'/templateHtml.php');