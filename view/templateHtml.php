<!DOCTYPE html>
<html lang="fr">
    <head>  <!-- script TinyMCE en fin de body -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title><?php echo $title; ?></title>
        
        <!-- meta description pour le SEO : améliorer la visibilité du site -->
        <meta name="description" content="<?php echo $metaDescription; ?>" />
        
        <!--lien google font police Monserrat-->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

        <!--lien font-awesome pour les icônes--> 
        <script src="https://kit.fontawesome.com/97e1d87785.js"></script>

        <!--liens pour le favicon (les 2 1ers pour version en ligne, le 3ème pour version en local)--> 
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/blogjf/public/images/favicon.ico" type="image/ico" />

        <!--lien bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <!--lien autre style-->
        <link rel="stylesheet" href="/blogjf/public/style.css"/>

    </head>
        
    <body>
        <?php echo $content; ?>

        <!-- script pour TinyMCE éditeur texte -->
        <script src="https://cdn.tiny.cloud/1/jy2e0nx3gog6j48dtlzexwjk3qxqq5noggxzme1zo8amqzcm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({ selector:'textarea'});</script> 

        <!-- script pour jquery -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="/blogjf/public/main.js"></script>

        <hr/>
        <footer class="footer">
            <div class ="container text-center">
                <button class="btn btn-default">
                    <div class="fab fa-twitter text-primary" aria-hidden title="Twitter"> Twitter</div>
                </button>
                <button class="btn btn-default">
                    <div class="fab fa-facebook text-primary" aria-hidden title="Facebook"> Facebook</div>
                </button>
                <button class="btn btn-default">
                    <div class="far fa-envelope text-primary" aria-hidden title="Contact"> Contact</div>
                </button>
                <button class="btn btn-default">
                    <div class="far fa-file text-primary" aria-hidden title="Mentions légales"> Mentions légales</div>
                </button>
            </div>

            <br/><br/>
        </footer>
    
    </body>
</html>

