<?php $title ='Ecrire un nouveau chapitre'; ?>
<?php $metaDescription="Administration - Ajouter un chapitre"; ?>

<?php ob_start(); ?>

    <div class ="container">
    
        <h1 class="text-primary">Ecrire un nouveau chapitre</h1>

        <!-- bouton Retour à la page Administration accueilAdmin-->
        <a class="btn btn-primary" href="index.php" role="button">Retour à la page Administration</a><br/><br/>

        <!-- formulaire pour écrire un nouveau chapitre -->
        <form action="index.php?action=addPost" method="post"><br/>

            <label for="title">Titre du chapitre</label><br/>
            <input type="text" id="title" name="title"/><br/>

            <label for="content">Contenu</label><br/>
            <textarea id="content" name="content"></textarea><br/>

            <label for="published">Voulez-vous publier le chapitre&nbsp;?</label>
            <input type="checkbox" id="published" name="published" checked value=1/><br/><br/>
       
            <input class="btn btn-success" type="submit"/><br/>
        </form>
    </div><br/>
   
<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');