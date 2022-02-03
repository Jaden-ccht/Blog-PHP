<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="Vues/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="Vues/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Blog</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Page Principale</a></li>
                <?php
                if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    echo '<li><a href="index.php?action=vueajoutnews">Ajouter un article</a></li>';
                    echo '<li><a href="index.php?action=deconnexion">Déconnexion</a></li>';
                }
                else
                    echo '<li><a href="index.php?action=vueconnexion">Connexion</a></li>';
                ?>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="navbar-header">
            <br>Nombre de commentaires : <?= $nbcom ?></br>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <br>Nombre de vos commentaires : <?= $nbComUti ?></br>
            </ul>
        </div>
    </div>
</div>


<!-- +++++ Content +++++ -->
<div class="container pt">
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3 centered">
            <h1><?= $news -> getTitre() ?></h1>
            <hr>
            <p><?= $news -> getContenu() ?></p>
            Posté le <?= $news -> getDateNews() ?>
            </span>
            <hr>
            <h1>Commentaires</h1>
            <?php foreach ($commentaires as $com) : ?>
                <div>
                    <h3 ><?= $com->getAuteur() ?></h3>
                    <p><?= $com->getContenuCom() ?></p>
                    </a>
                    <p>
                        <?= $com->getDateCom() ?>
                    </p>
                </div>
            <?php endforeach;?>
            <hr>
            <a href="index.php?id=<?= $id?>&action=vueajoutcom">Ecrire un commentaire</a>
        </div>
    </div>
</div><!-- /container -->
<!-- +++++ Footer Section +++++ -->

<div id="footer" style="bottom: 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h4>Le projet est terminé !</h4>
                <p>
                    Ce projet a été réalisé par Etienne CELLIER et Jaden COUCHOT
                </p>
            </div><!-- /col-lg-4 -->
        </div>
    </div>
</div>

</body>
</html>
