<?php

class AdminGateway
{
    private $_bdd;

    public function __construct(Connexion $con){
        $this->_bdd = $con;
    }

    public function isAdmin($pseudo, $mdp){
        $queryCom = 'SELECT COUNT(*) FROM admin WHERE Pseudo = :pseudo';
        $this->_bdd->executeQuery($queryCom, array(':pseudo'=> array ($pseudo, PDO::PARAM_STR)));
        $results = $this->_bdd->getResults();
        if($results[0]['COUNT(*)'] == 1) {
            $queryCom = 'SELECT Mdp FROM admin WHERE Pseudo = :pseudo';
            $this->_bdd->executeQuery($queryCom, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));
            $results = $this->_bdd->getResults();
            return password_verify($mdp, $results[0]['Mdp']);
        }
        else
            return false;
    }
}


?>