<?php $title ='Gérer les chapitres'; ?>
<?php $metaDescription="Administration - Gérer les chapitres"; ?>

<?php ob_start(); ?>

    <div class ="container-fluid">
    
        <h1 class="text-primary">Gérer les chapitres</h1>

        <!-- bouton Retour à la page Administration accueilAdmin-->
        <a class="btn btn-primary" href="index.php" role="button">Retour à la page Administration</a><br/><br/>

        <h2>Liste de tous les chapitres</h2><br/>
        <p class="text-primary"><strong>Choisissez le chapitre à modifier ou à supprimer : </strong></p><br/>
        
        <!-- afficher tous les chapitres publiés et non publiés dans un tableau-->
        <table class="table table-striped">
            <tr class="text-primary">
                <th>Titre</th>
                <th>Date création</th>
                <th>Date mise à jour</th>
                <th>Publié ?</th>
                <th>Lien</th>
            </tr>
            
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
                    
                    <td><?php if ($data['published']==1){
                        echo '<span class="glyphicon glyphicon-ok btn-success"></span>';
                    } else {
                        echo '<span class="glyphicon glyphicon-remove btn-danger"></span>';
                    }?></td>
                    
                    <td><a href="index.php?action=updatePost&id=<?php echo $data['id'];?>" role="button" class="glyphicon glyphicon-share-alt btn-primary"></a></td>
                </tr>
            <?php               
            }   
            ?>
        </table><br/><br/>   

        <!-- afficher n° page en cours sur nbPages + icône avant et arrière avec liens --> 
        <div class="text-center"><h4>
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
        </h4></div>
               
        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/>

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');