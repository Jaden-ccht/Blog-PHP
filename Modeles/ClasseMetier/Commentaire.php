<?php

class Commentaire
{
    private $_ID;
    private $_NewsID;
    private $_Auteur;
    private $_ContenuCom;
    private $_DateCom;

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

    public function setID($value){
        $value = (int) $value;
        if($value > 0){
            $this -> _ID = $value;
        }
    }

    public function setNewsID($value){
        $value = (int) $value;
        if($value > 0){
            $this -> _NewsID = $value;
        }
    }

    public function setAuteur($value){
        if(is_string($value)){
            $this -> _Auteur = $value;
        }
    }

    public function setContenuCom($value){
        if(is_string($value)){
            $this -> _ContenuCom = $value;
        }
    }

    public function setDateCom($value){
        $this->_DateCom = $value;
    }

    //Getters

    public function getID(){
        return $this -> _ID;
    }

    public function getNewsID(){
        return $this -> _NewsID;
    }

    public function getAuteur(){
        return $this -> _Auteur;
    }

    public function getContenuCom(){
        return $this -> _ContenuCom;
    }
    public function getDateCom(){
        return $this -> _DateCom;
    }
}

?>