<?php

class News
{
    private $_ID;
    private $_Titre;
    private $_Contenu;
    private $_DateNews;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this -> $method($value);
            }
        }
    }

    //Setters

    public function setID($id){
        $id = (int) $id;
        if($id > 0){
            $this -> _ID = $id;
        }
    }

    public function setTitre($titre){
        if(is_string($titre)){
            $this -> _Titre = $titre;
        }
    }

    public function setContenu($contenu){
        if(is_string($contenu)){
            $this -> _Contenu = $contenu;
        }
    }

    public function setDateNews($datenews){
        $this->_DateNews = $datenews;
    }

    //Getters

    public function getID(){
        return $this -> _ID;
    }

    public function getTitre(){
        return $this -> _Titre;
    }

    public function getContenu(){
        return $this -> _Contenu;
    }

    public function getPartialContent(){
        return substr($this->_Contenu, 0, 250).'...';
    }

    public function getDateNews(){
        return $this -> _DateNews;
    }
}

?>