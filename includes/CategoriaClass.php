<?php

    Class Categoria{

        private $nome;
        private $id;

        public function __construct($id, $nome)
        {
            $this -> id = $id;
            $this -> nome = $nome;
        }

        function getCategID(){
            return $this->id;
        }

        function getCategNome(){
            return $this->nome;
        }
    }

    Class SerieCateg{
        
        private $ID;
        private $nome;
        private $locandina;
        private $annoInizio;
        private $annoFine;
        
        public function __construct($id, $nome, $locandina, $annoInizio, $annoFine)
        {
            $this -> id = $id;
            $this -> nome = $nome;
            $this -> locandina = $locandina;
            $this -> annoInizio = $annoInizio;
            $this -> annoFine = $annoFine;
        }

        function getSerieID(){
            return $this->ID;
        }
        
        function getSerieNome(){
            return $this->nome;
        }

        function getSerieLocandina(){
            return $this->locandina;
        }

        function getSerieAnnoInizio(){
            return $this->annoInizio;
        }
        
        function getSerieAnnoFine(){
            return $this->annoFine;
        }
    }


?>