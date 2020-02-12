<?php $title ='Gérer les chapitres'; ?>
<?php $metaDescription="Administration - Gérer les chapitres"; ?>

<?php ob_start(); ?>

    <div class ="container">
    
        <h1 class="text-primary">Gérer les chapitres</h1>

        <!-- bouton Retour à la page Administration accueilAdmin-->
        <a class="btn btn-primary" href="index.php" role="button">Retour à la page Administration</a><br/><br/>

        <h2>Liste de tous les chapitres</h2><br/>
        <p class="text-primary"><strong>Choisissez le chapitre à modifier ou à supprimer&nbsp;: </strong></p><br/>
        
        <!-- afficher tous les chapitres publiés et non publiés dans un tableau-->
        <div class ="table-responsive-sm">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr class="text-primary">
                        <th class="col-sm-1">Titre</th>
                        <th class="col-sm-2">Date création</th>
                        <th class="col-sm-2">Date mise à jour</th>
                        <th class="col-sm-1 text-center">Publié ?</th>
                        <th class="col-sm-1 text-center">Lien</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($posts as $data) {
                ?>
                    <tr>
                        <td class="text-uppercase"><strong><?php echo $data['title'];?></strong></td>
                        <td><?php echo $data['postDate_fr'];?></td>
                         
                        <td><?php if (($data['postDate_fr'])==($data['updateDate_fr'])){
                            echo '-' ;
                        } else {     
                            echo $data['updateDate_fr'];
                        }?></td>
                        
                        <td class="text-center"><?php if ($data['published']==1){
                            echo '<span class="glyphicon glyphicon-ok btn-success"></span>';
                        } else {
                            echo '<span class="glyphicon glyphicon-remove btn-danger"></span>';
                        }?></td>
                        
                        <td class="text-center"><a href="index.php?action=updatePost&id=<?php echo $data['id'];?>" role="button" class="glyphicon glyphicon-share-alt btn-primary"></a></td>
                    </tr>
                <?php               
                }   
                ?>
                </tbody>
            </table><br/><br/>   
        </div>

        <!-- afficher n° page en cours sur nbPages + icône avant et arrière avec liens --> 
        <div class ="text-center">
            <h4 >
            <?php
            $next=$currentPage+1;
            $previous=$currentPage-1;

            if ($currentPage >1){
                echo '<a class="glyphicon glyphicon-backward" href="index.php?action=managePosts&p='.$previous.'" title="bouton arrière"></a>';
            } 
            echo ' '.$currentPage .' sur ' .$nbPages.' ';

            if ($currentPage<$nbPages){
                echo '<a class="glyphicon glyphicon-forward" href="index.php?action=managePosts&p='.$next.'" title="bouton avant"></a>';
            }
            ?>
            </h4>
        </div>
              

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/>

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');