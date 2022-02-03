<?php
class ModeleUtilisateur
{
    private $_bdd;

    public function __construct(Connexion $con){
        $this->_bdd = $con;
    }


    protected function getBdd(){
        return $this->_bdd;
    }

    //Fonctions pour la NewsGateway

    public function getNews() : array{
        $ng = new NewsGateway($this->getBdd());
        return $ng-> getNews();
    }

    public function getNewsByPage($premier, $nbnewsparpage) : array{
        $ng = new NewsGateway($this->getBdd());
        return $ng-> getNewsByPage($premier, $nbnewsparpage);
    }

    public function getNewsByID($id){
        $ng = new NewsGateway($this->getBdd());
        return $ng-> getNewsByID($id);
    }

    public function getNbNewsByDate($datenews) {
        $ng = new NewsGateway($this->getBdd());
        return $ng-> getNbNewsByDate($datenews);
    }

    public function getNewsByDate($datenews) : array{
        $ng = new NewsGateway($this->getBdd());
        return $ng-> getNewsByDate($datenews);
    }

    //Fonctions pour la CommentaireGateway

    public function getCom() : array {
        $cg = new CommentaireGateway($this->getBdd());
        return $cg->getCom();
    }

    public function getComByNewsID($newsid) {
        $cg = new CommentaireGateway($this->getBdd());
        return $cg->getComByNewsID($newsid);
    }

    public function ajoutCom($newsid, $auteur, $contenu) {
        $cg = new CommentaireGateway($this->getBdd());
        return $cg->ajoutCom($newsid, $auteur, $contenu);
    }

    public function getnbcom() {
        $cg = new CommentaireGateway($this->getBdd());
        return $cg->getNbCom();
    }

    //Fonctions liées au cookies

    public function getCompteur(){
        if(isset($_COOKIE['nbCom'])){
            //return Validation::netCookie($_COOKIE['nbCom']);
            return $_COOKIE['nbCom'];
        }
        $this->resetCookie();
        return 0;
    }

    public function resetCookie(){
        setcookie("nbCom", "", time() - 3600);
        setcookie("nbCom", 0, time()+365*24*3600);
    }

    function addCookieNbCom(){
        if (isset($_COOKIE['nbCom'])) {
            $nbComCookie = $this->getCompteur();
            setcookie("nbCom", $nbComCookie+1, time()+365*24*3600);
        }
        else  $this->resetCookie();
    }
}
?>