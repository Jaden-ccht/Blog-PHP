<?php

class FrontControleur
{

    public function __construct(){
        //Modele
        global $md;
        //Variables de connexion
        global $con, $dsn,$user, $password;
        $con = new Connexion($dsn,$user, $password);
        //Variables globales dans config.php
        global $rep,$vues, $erreurs;

        global $listeAction, $action;
        try {
            $String_Actor = '';
            $listeAction = array(
                'Utilisateur' => array('vueajoutcom', 'voirarticle', 'ajoutcom','vueconnexion', 'recherche'),
                'Admin' => array('vueajoutnews', 'ajoutnews', 'suppnews', 'conadm', 'deconnexion')
            );

            $action = Validation::sanitizeString($_REQUEST['action']);
            if ($action != null){
                $String_Actor = $this->isGoodAction($action);
            }
            else {
                $String_Actor = 'Utilisateur';
            }
            $mdlclass = "Modele".$String_Actor;
            $md = new $mdlclass($con);

            if ($String_Actor != 'Utilisateur'){

                if (!$md->isAdmin() && $action != 'conadm')
                    require($rep.$vues['connexion']);
                else{
                    $ctrlclass = "Controleur".$String_Actor;
                    new $ctrlclass();
                }
            }
            else {
                $ctrlclass = "Controleur".$String_Actor;
                new $ctrlclass();
            }
        }
        catch (Exception $e) {
            if($e->getCode() != 2) {
                array_push($erreurs, 'Erreur innattendue FC 1');
            }
            array_push($erreurs, $e->getMessage());
            require ($rep.$vues['erreur']);
        }
        catch(Error $e2) {
            array_push($erreurs, 'Erreur innattendue FC 2');
            array_push($erreurs, $e2->getMessage());
            require ($rep.$vues['erreur']);
        }
    }

    private function isGoodAction(string $action) : string {
        global $listeAction, $rep, $vues,$erreurs;
        if (in_array($action, $listeAction['Utilisateur'])) {
            return "Utilisateur";
        }
        if (in_array($action, $listeAction['Admin'])) {
            return "Adm";
            }
        else {
            throw new Exception('Action inconnue', 2);
        }
    }
}

?>