<?php

class ModeleAdm
{
    private $_bdd;

    public function __construct(Connexion $con){
        $this->_bdd = $con;
    }

    protected function getBdd(){
        return $this->_bdd;
    }

    public function connexion($login, $mdp) {
        //nettoyer $login, $mdp
        $ag = new AdminGateway($this->getBdd());
        if($ag->isAdmin($login, $mdp)){
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
        }
    }

    public function deconnexion() {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isAdmin() {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            return true;
        }
        else
            return false;
    }

    public function suppnews($id){
        $ng = new NewsGateway($this->getBdd());
        $ng->supprimerNews($id);
        $cg = new CommentaireGateway($this->getBdd());
        if($cg->getNbComByNewsID($id)>0)
            $cg->supCom($id);
    }

    public function ajoutNews($titre, $contenu){
        $ng = new NewsGateway($this->getBdd());
        $ng->ajoutNews($titre, $contenu);
    }

    public function getLastID(){
        $ng = new NewsGateway($this->getBdd());
        return $ng->getLastID();
    }
}

?>