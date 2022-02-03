<?php
class CommentaireGateway
{
    private $_bdd;

    public function __construct(Connexion $con){
        $this->_bdd = $con;
    }

    public function getCom() : array {
        $var = [];
        $query = 'SELECT * FROM commentaire ORDER BY ID desc';
        $this->_bdd->executeQuery($query);
        $results = $this->_bdd->getResults();
        Foreach ($results as $data)
            $var[] = new Commentaire($data);
        return $var;
    }

    public function getComByNewsID($newsid) {
        $var = [];
        $query = 'SELECT * FROM commentaire WHERE NewsID = :id ORDER BY DateCom DESC';
        $this->_bdd->executeQuery($query, array(':id' => array($newsid, PDO::PARAM_INT)));
        $results = $this->_bdd->getResults();
        Foreach ($results as $data)
            $var[] = new Commentaire($data);
        return $var;
    }

    public function getNbCom(){
        $queryCom = 'SELECT COUNT(*) FROM commentaire';
        $this->_bdd->executeQuery($queryCom);
        $results = $this->_bdd->getResults();
        return $results[0]['COUNT(*)'];
    }

    public function getNbComByNewsID($id){
        $queryCom = 'SELECT COUNT(*) FROM commentaire WHERE NewsID = :id';
        $this->_bdd->executeQuery($queryCom, array(':id'=> array($id, PDO::PARAM_INT)));
        $results = $this->_bdd->getResults();
        return $results[0]['COUNT(*)'];
    }

    public function ajoutCom($NewsID, $Auteur, $ContenuCom){
        $queryCom = 'INSERT INTO commentaire(NewsID, Auteur, ContenuCom) VALUES(:newsID, :auteur, :contenuCom)';
        $this->_bdd->executeQuery($queryCom, array(':newsID'=> array($NewsID, PDO::PARAM_INT),
            ':auteur'=> array ($Auteur, PDO::PARAM_STR),
            ':contenuCom'=> array ($ContenuCom, PDO::PARAM_STR)));
    }

    public function supCom($id){
        $queryCom = 'DELETE FROM commentaire WHERE NewsID = :id';
        $this->_bdd->executeQuery($queryCom, array(':id'=> array($id, PDO::PARAM_INT)));
    }
}

?>