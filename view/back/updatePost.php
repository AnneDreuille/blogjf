<?php $title ='Modifier ou supprimer un chapitre'; ?>
<?php $metaDescription="Administration - Modifier un chapitre"; ?>

<?php ob_start(); ?>

    <div class ="container-fluid">
    
        <h1 class ="text-primary">Modifier ou supprimer un chapitre</h1>

        <!-- bouton Retour à la page Administration accueilAdmin-->
        <a class="btn btn-primary" href="index.php" role="button">Retour à la page Administration</a><br/><br/>

        <!-- afficher le chapitre à modifier dans un formulaire prérempli -->
        <form method="post"> 

            <label for="title">Titre du chapitre</label><br/>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']);?>"/><br/>

            <label for="content">Contenu</label><br/>
            <textarea id="content" name="content"><?php echo nl2br(strip_tags($post['content']));?></textarea><br/><br/>

            <label for="published">Chapitre publié ?</label>
            <?php
            $published=$post['published'];
            if ($published==true){
            ?>
                <input type="checkbox" id="published" name="published" value=1 checked/>
            <?php
                } else if ($published==false){
            ?>
                <input type="checkbox" id="published" name="published" value=0 />
            <?php  
                }
            ?><br/><br/>
            
            <input class="btn btn-success" type="submit" value="Valider la modification"/>
        </form><br/>
        
        <!-- supprimer le chapitre -->
        <form action="index.php?action=deletePost&id=<?php echo $post['id'];?>" method="post">
            <input class="btn btn-danger" type="submit" value="Supprimer le chapitre"/>
        </form><br/>
   
        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a>

    </div><br/>
   
<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');