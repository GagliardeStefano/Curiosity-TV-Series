<?php


    Class SerieUtente{
        
        private $idSerie;
        private $nome;
        private $locandina;
        private $voto;
        private $annoInizio;

        function __construct($idSerie, $nome, $locandina, $voto, $annoInizio)
        {
            $this->idSerie = $idSerie;
            $this->nome = $nome;
            $this->locandina = $locandina;
            $this->voto = $voto;
            $this->annoInizio = $annoInizio;
        }

        public function getIdSerieUtente(){
            return $this->idSerie;
        }
        
        public function getNomeSerieUtente(){
            return $this->nome;
        }
        
        public function getLocandinaSerieUtente(){
            return $this->locandina;
        }

        public function getVotoSerieUtente(){
            return $this->voto;
        }

        public function getAnnoSerieUtente(){
            return $this->annoInizio;
        }

    }
?>