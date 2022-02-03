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
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <form action="index.php?action=recherche" method="post">
                    <label for="Rechercher">Rechercher par date :</label>
                    <input type="date" name="date" id="date" required>
                    <button type="submit">Rechercher</button>
                </form>
            </div><!-- /col-lg-4 -->
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


<!-- +++++ Posts Lists +++++ -->
<?php if(count($articlespage) != 0) {
    foreach ($articlespage as $article) : ?>

<div id="grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                            <h4><?= $article->getTitre() ?></h4>
                            <p><?= $article->getPartialContent() ?></p>
                        </a>
                        <p>
                            <bd><Time><?= $article->getDateNews() ?></Time></bd>
                        </p>
            </div>
        </div><!-- /row -->
    </div> <!-- /container -->
    <div class="container">
        <div class="row mt centered">
            <div class="col-lg-6 col-lg-offset-3 centered">
                    <?php
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                        echo '<div class="col-lg-6"><a href="index.php?id='.$article->getID().'&action=voirarticle">Lire la suite</a></div>';
                        echo '<div class="col-lg-6"><a href="index.php?action=suppnews&id='.$article->getID().'">Supprimer l\'article</a></div>';
                    }
                    else echo '<a href="index.php?id='.$article->getID().'&action=voirarticle">Lire la suite</a>';
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!-- /grey -->
<?php endforeach;}
    else {
        echo "<div class='container' style='margin-bottom: 480px; padding-top: 50px'>
        <div class='row'>
            <div class='col-lg-6 col-lg-offset-3 centered'>
                <p>Aucune news trouvée</p>
            </div><!-- /col-lg-4 -->
        </div>
    </div>";
    }

?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 centered" style="padding-right: 0">
            <ul class="pagination">
                <?php
                if($pages > 1) {
                    echo '<a href="index.php?page=1">1</a>';
                    if($currentPage > 1) echo '<a href="index.php?page='.($currentPage - 1).'">&lt;</a>';
                    echo '...'.$currentPage.'...';
                    if($currentPage < $pages) echo '<a href="index.php?page='.($currentPage + 1).'">&gt;</a>';
                    echo '<a href="index.php?page='.$pages.'">'.$pages.'</a>';
                }
                else {
                    echo 1;
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- +++++ Footer Section +++++ -->

<div id="footer">
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
