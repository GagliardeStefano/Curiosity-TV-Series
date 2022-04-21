<?php

    Class Categoria{

        private $id;
        private $nome;
        

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
        
        private $id;
        private $nome;
        private $locandina;
        private $annoInizio;
        private $annoFine;
        private $voto;
        
        public function __construct($id, $nome, $locandina, $annoInizio, $annoFine, $voto)
        {
            $this -> id = $id;
            $this -> nome = $nome;
            $this -> locandina = $locandina;
            $this -> annoInizio = $annoInizio;
            $this -> annoFine = $annoFine;
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
        
        function getSerieAnnoFine(){
            return $this->annoFine;
        }

        function getSerieVoto(){
            return $this->voto;
        }
    }


?>