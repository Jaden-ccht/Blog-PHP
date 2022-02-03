<?php
class NewsGateway
{
    private $_bdd;

    public function __construct(Connexion $con){
        $this->_bdd = $con;
    }

    public function getNews() : array {
        $var = [];
        $query = 'SELECT * FROM news ORDER BY ID desc';
        $this->_bdd->executeQuery($query);
        $results = $this->_bdd->getResults();
        Foreach ($results as $data)
            $var[] = new News($data);
        return $var;
    }

    public function getNewsByPage($premier, $nbnewsparpage) : array{
        $var = [];
        $query = 'SELECT * FROM news ORDER BY DateNews DESC LIMIT :premier, :parpage';
        $this->_bdd->executeQuery($query, array(':premier' => array($premier, PDO::PARAM_INT), ':parpage' => array($nbnewsparpage, PDO::PARAM_INT)));
        $results = $this->_bdd->getResults();
        Foreach ($results as $data)
            $var[] = new News($data);
        return $var;
    }

    public function getNewsByID($id) {
        $var = [];
        $query = 'SELECT * FROM news WHERE ID = :id';
        $this->_bdd->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $results = $this->_bdd->getResults();
        Foreach ($results as $data)
            $var[] = new News($data);
        return $var[0];
    }

    public function getNbNewsByDate($datenews){
        $query = 'SELECT COUNT(*) FROM news WHERE DateNews = :datenews';
        $this->_bdd->executeQuery($query, array(':datenews'=> array ($datenews, PDO::PARAM_STR)));
        $results = $this->_bdd->getResults();
        return $results[0]['COUNT(*)'];
    }

    public function getNewsByDate($datenews) : array{
        $var = [];
        $query = 'SELECT * FROM news WHERE DATE(DateNews) = :datenews';
        $this->_bdd->executeQuery($query, array(':datenews'=> array ($datenews, PDO::PARAM_STR)));
        $results = $this->_bdd->getResults();
        Foreach ($results as $data)
            $var[] = new News($data);
        return $var;
    }

    public function getLastID(){
        $query = 'SELECT MAX(ID) FROM news';
        $this->_bdd->executeQuery($query);
        $results = $this->_bdd->getResults();
        return (int)$results[0]['MAX(ID)'];
    }

    public function ajoutNews($titre, $contenu){
        $queryCom = 'INSERT INTO news(Titre, Contenu) VALUES(:titre, :contenu)';
        $this->_bdd->executeQuery($queryCom, array(':titre'=> array ($titre, PDO::PARAM_STR),
            ':contenu'=> array ($contenu, PDO::PARAM_STR)));
    }

    public function supprimerNews($id){
        $queryCom = 'DELETE FROM news WHERE ID = :id';
        $this->_bdd->executeQuery($queryCom, array(':id'=> array ($id, PDO::PARAM_INT)));
    }


}

?>