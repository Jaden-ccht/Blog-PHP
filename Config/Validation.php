<?php
class Validation
{
    static function verifChamp($auteur, $commentaire){
        global $erreurs;
        if (empty($auteur)){
            array_push($erreurs, 'Veuillez entrer un pseudonyme.');
        }
        if (empty($commentaire)){
            array_push($erreurs, 'Veuillez entrer un commentaire.');
        }
        if (count($erreurs) == 0){
            return true;
        }
        else{
            return false;
        }
    }

    static function verifCon($identifiant, $mdp){
        global $erreurs;
        if (empty($identifiant)){
            array_push($erreurs, 'Veuillez entrer un pseudonyme.');
        }
        if (empty($mdp)){
            array_push($erreurs, 'Veuillez entrer un mdp.');
        }
        if (count($erreurs) == 0){
            return true;
        }
        else{
            return false;
        }
    }

    static function verifNews($titre, $contenu){
        global $erreurs;
        if (empty($titre)){
            array_push($erreurs, 'Veuillez entrer un titre.');
        }
        if (empty($contenu)){
            array_push($erreurs, 'Veuillez entrer un contenu de commentaire.');
        }
        if (count($erreurs) == 0){
            return true;
        }
        else{
            return false;
        }
    }

    static function sanitizeString($str) {
        return filter_var($str, FILTER_SANITIZE_STRING);
    }
}

?>