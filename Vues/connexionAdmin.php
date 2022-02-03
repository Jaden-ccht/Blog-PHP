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
            <h3>CONNEXION</h3>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <form role="form" action="index.php?action=conadm" method="post">
                <div class="form-group">
                    <p><input placeholder="Identifiant" class="form-control" type="text" name="identifiant" id="identifiant"/></p>
                    <br>
                </div>
                <div class="form-group">
                    <p><input placeholder="Mot-de-passe" class="form-control" type="password" name="mdp" id="idenmdptifiant"/></p>
                    <br>
                </div>
                <br>
                <button type="submit" class="btn btn-success">SE CONNECTER</button>
            </form>
        </div>
    </div><!-- /row -->
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
            </div>
        </div>
    </div>
</div>
</body>
</html>
