<?php

    Class Categoria{

        private $nome;
        private $id;
        
        

        public function __construct($nome, $id)
        {
            $this -> nome = $nome;
            $this -> id = $id;
        }

        function getCategNome(){
            return $this->nome;
        }

        function getCategID(){
            return $this->id;
        }

    }

    Class SerieCateg{
        
        private $id;
        private $nome;
        private $locandina;
        private $annoInizio;
        private $voto;
        
        public function __construct($id, $nome, $locandina, $annoInizio, $voto)
        {
            $this -> id = $id;
            $this -> nome = $nome;
            $this -> locandina = $locandina;
            $this -> annoInizio = $annoInizio;
            $this->voto = $voto;
        }

        function getSerieID(){
            return $this->id;
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
        
        function getSerieVoto(){
            return $this->voto;
        }
    }


?>