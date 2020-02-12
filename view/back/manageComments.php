<?php $title ='Gérer les commentaires'; ?>
<?php $metaDescription="Administration - Gérer les commentaires"; ?>

<?php ob_start(); ?>

    <div class ="container">
    
        <h1 class="text-primary">Gérer les commentaires</h1>

        <!-- bouton Retour à la page Administration accueilAdmin-->
        <a class="btn btn-primary" href="index.php" role="button">Retour à la page Administration</a><br/><br/>

        <!-- afficher les commentaires avec une alerte -->
        <h2>Liste des commentaires avec alerte</h2><br/>
        <p class="text-primary"><strong>Choisissez le commentaire à gérer&nbsp;: </strong></p>
        <p>NB : Lorsque tous les commentaires sont gérés, cette page doit être vierge.</p><br/>
        
        <div class ="table-responsive-sm">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr class="text-primary">
                        <th class="col-sm-1">Pseudo</th>
                        <th class="col-sm-2">Date commentaire</th>
                        <th class="col-sm-8">Commentaire</th>
                        <th class="col-sm-1 text-center">Lien</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($listAlertComments as $data) {
                ?> 
                    <tr>
                        <td class="text-uppercase"><strong><?php echo $data['pseudo'];?></strong></td>
                            
                        <td><?php echo $data['commentDate_fr'];?></td>

                        <td><?php echo nl2br(strip_tags($data['comment']));?></td>    

                        <td class="text-center"><a href="index.php?action=updateComment&id=<?php echo $data['id'];?>" role="button" class="glyphicon glyphicon-share-alt btn-primary"></a></td>
                    </tr>           
           
                <?php
                }
                ?>
                </tbody>
            </table><br/><br/>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/> <!-- fin div container -->
   
<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');