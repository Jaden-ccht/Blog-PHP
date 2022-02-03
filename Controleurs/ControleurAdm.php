<?php

class ControleurAdm
{
    function __construct() {
        try {
            global $action, $rep, $vues, $erreurs, $mdl, $con, $nbcom, $nbComUti;
            $mdl = new ModeleUtilisateur($con);
            $nbcom = $mdl->getnbcom();
            $nbComUti = $mdl->getCompteur();
            switch ($action) {
                case "vuesnews":
                    $this->Reinit();
                    break;
                case "conadm":
                    $this->conadm();
                    break;
                case "deconnexion":
                    $this->deconnexion();
                    break;
                case "suppnews":
                    $this->suppnews();
                    break;
                case "vueajoutnews":
                    $this->vueajoutnews();
                    break;
                case "ajoutnews":
                    $this->ajoutnews();
                    break;
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
        global $rep,$vues, $NewsparPage, $mdl, $erreurs, $nbcom, $nbComUti;
        try {
            $page = $_REQUEST['page'];
            if ($page == null) {
                $currentPage = 1;
            }
            else {
                $currentPage = (int)$page;
            }
            $articles = $mdl->getNews();
            $nbarticles = count($articles);

            $pages = ceil($nbarticles / $NewsparPage);
            $premier = ($currentPage * $NewsparPage) - $NewsparPage;

            $articlespage = $mdl->getNewsByPage($premier, $NewsparPage);
            require($rep . $vues['principale']);
        }
        catch (PDOException $e){
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            array_push($erreurs, $e->getMessage());
            require ($rep.$vues['erreur']);
        }
    }

    function conadm(){
        global $rep, $vues, $md, $erreurs, $nbcom, $nbComUti;
        if (!empty($_POST))
        {
            extract($_POST);

            if(Validation::verifCon($_POST['identifiant'], $_POST['mdp'])){
                $md->connexion($_POST['identifiant'],$_POST['mdp']);
                if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    $this->Reinit();
                }
                else {
                    array_push($erreurs, 'Identifiant ou mot de passe incorrect.');
                    require($rep . $vues['erreur']);
                }
            }
            else {
                require($rep . $vues['erreur']);
            }
        }
    }

    function deconnexion(){
        global $md;
        $md->deconnexion();
        $this->Reinit();
    }

    function suppnews(){
        global $rep, $vues, $md, $nbcom, $mdl, $nbComUti;

        if (!isset($_GET['id']) or !is_numeric($_GET['id']))
            require 'index.php';

        else {
            extract($_GET);
            $id = strip_tags($id);
            $md->suppnews($id);
            $nbcom = $mdl->getnbcom();
            $nbComUti = $mdl->getCompteur();
            $this->Reinit();
        }
    }

    function vueajoutnews(){
        global $rep, $vues, $nbcom, $nbComUti;
        require($rep . $vues['addnews']);
    }

    function ajoutnews(){
        global $rep, $vues, $md, $erreurs, $mdl, $nbcom, $nbComUti;
        if (!empty($_POST))
        {
            extract($_POST);

            if(Validation::verifNews($_POST['titre'], $_POST['contenu'])){
                $md->ajoutNews($_POST['titre'],$_POST['contenu']);
                $id = $md->getLastID();
                $news = $mdl->getNewsByID($id);
                $commentaires = $mdl->getComByNewsID($id);
                require($rep . $vues['news']);
            }
            else {
                require($rep . $vues['erreur']);
            }
        }
    }
}

?>