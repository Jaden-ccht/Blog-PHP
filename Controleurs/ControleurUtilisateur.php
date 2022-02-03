<?php
class ControleurUtilisateur{

    function __construct() {
        try {
            global $action, $rep, $vues, $erreurs, $md, $nbcom, $nbComUti;
            $nbcom = $md->getnbcom();
            $nbComUti = $md->getCompteur();
            switch ($action) {
                case NULL:
                    $this->Reinit();
                    break;
                case "voirarticle":
                    $this->voirarticle();
                    break;
                case "ajoutcom":
                    $this->ajoutercom();
                    break;
                case "vueajoutcom":
                    $this->vueajoutcom();
                    break;
                 case "vueconnexion":
                    $this->vueconnexion();
                    break;
                case "conadm":
                    $this->connexionadm();
                    break;
                case "recherche":
                    $this->recherche();
                    break;

                //mauvaise action
                default:
                    array_push($erreurs, 'Erreur d\'appel php');
                    require($rep . $vues['erreur']);
                    break;
            }

        }
        catch (PDOException $e){
            //si erreur BD, pas le cas ici
            array_push($erreurs, 'Erreur PDO innattendue');
            array_push($erreurs, $e->getMessage());
            require ($rep.$vues['erreur']);
        }

        catch (Exception $e2){
            array_push($erreurs, 'Erreur innattendue');
            array_push($erreurs, $e2->getMessage());
            require ($rep.$vues['erreur']);
        }
        exit(0);
    }


    function Reinit() {
        global $rep,$vues, $NewsparPage, $md, $erreurs, $nbcom, $nbComUti;
        try {
            $page = $_REQUEST['page'];
            if ($page == null) {
                $currentPage = 1;
            }
            else {
                $currentPage = (int)$page;
            }
            $articles = $md->getNews();
            $nbarticles = count($articles);

            $pages = ceil($nbarticles / $NewsparPage);
            $premier = ($currentPage * $NewsparPage) - $NewsparPage;

            $articlespage = $md->getNewsByPage($premier, $NewsparPage);
            require($rep . $vues['principale']);
        }
        catch (PDOException $e){
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            array_push($erreurs, $e->getMessage());
            require ($rep.$vues['erreur']);
        }
    }

    function voirarticle()
    {
        global $rep, $vues, $md, $nbcom, $erreurs, $nbComUti;

        if (!isset($_GET['id']) or !is_numeric($_GET['id']))
            require 'index.php';

        else {
            extract($_GET);
            $id = strip_tags($id);
            $news = $md->getNewsByID($id);
            if($news != null){
                $commentaires = $md->getComByNewsID($id);
                require($rep . $vues['news']);
            }
            else{
                array_push($erreurs, 'ID d\'article innexistant.');
                require($rep . $vues['erreur']);
            }
        }
    }

    function vueajoutcom()
    {
        global $rep, $vues, $nbcom, $nbComUti;

        if (!isset($_GET['id']) or !is_numeric($_GET['id']))
            require 'index.php';

        else {
            extract($_GET);
            $id = strip_tags($id);

            require($rep . $vues['com']);
        }
    }

    function ajoutercom()
    {
        global $rep, $vues, $md, $erreurs, $nbcom, $nbComUti;

        if (!isset($_GET['id']) or !is_numeric($_GET['id']))
            require 'index.php';
        else{
            extract($_GET);
            $id = strip_tags($id);

            if (!empty($_POST))
            {
                extract($_POST);

                if(Validation::verifChamp($_POST['auteur'], $_POST['commentaire'])){
                    $auteur = Validation::sanitizeString($_POST['auteur']);
                    $contenu = Validation::sanitizeString($_POST['commentaire']);
                    $md->ajoutCom($id,$auteur,$contenu);
                    $_SESSION['login'] = $auteur;
                    $news = $md->getNewsByID($id);
                    $commentaires = $md->getComByNewsID($id);
                    $nbcom = $md->getnbcom();
                    $md->addCookieNbCom();

                    $nbComUti = $md->getCompteur();
                    require($rep . $vues['news']);
                }
                else {
                    require($rep . $vues['erreur']);
                }
            }
        }
    }

    function vueconnexion()
    {
        global $rep, $vues, $nbcom, $nbComUti;
        require($rep . $vues['connexion']);
    }

    function recherche() {
        global $rep,$vues, $NewsparPage, $md, $erreurs, $nbcom, $nbComUti;
        try {
            $page = $_REQUEST['page'];
            if ($page == null) {
                $currentPage = 1;
            }
            else {
                $currentPage = $page;
            }
            if(isset($_POST['date'])){
                $date = Validation::sanitizeString($_POST['date']);
                $pages = ceil($md->getNbNewsByDate($date) / $NewsparPage);
                $premier = ($currentPage * $NewsparPage) - $NewsparPage;

                $articlespage = $md->getNewsByDate($date);
                require($rep . $vues['principale']);
            }
        }
        catch (PDOException $e){
            $dVueEreur[] =	"Erreur inattendue!!! ";
            array_push($erreurs, $e->getMessage());
            require ($rep.$vues['erreur']);
        }
    }
}

?>