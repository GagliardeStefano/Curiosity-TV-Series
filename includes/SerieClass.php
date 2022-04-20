<?php
class Serie{

    private $id;
    private $nome;
    private $trama;
    private $locandina;
    private $voto;
    private $annoI;
    private $annoF;
    private $img;


    function __construct($id, $nome, $trama, $locandina, $voto, $annoI, $annoF, $img)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->trama = $trama;
        $this->locandina = $locandina;
        $this->voto = $voto;
        $this->annoI = $annoI;
        $this->annoF = $annoF;
        $this->img = $img;

    }

    function getID(){
       return $this->id; 
    }

    function getNome(){
        return $this->nome; 
    }

    function getTrama(){
        return $this->trama; 
    }
    function getLocandina(){
        return $this->locandina; 
    }
    function getVoto(){
        return $this->voto; 
    }
    function getAnnoI(){
        return $this->annoI; 
    }
    function getAnnoF(){
        return $this->annoF; 
    }
    function getimg(){
        return $this->img; 
    }
}


?>