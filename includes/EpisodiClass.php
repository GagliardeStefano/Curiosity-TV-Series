<?php

    Class Stagioni{
        private $NumStagione;
        private $NumEpisodio;
        private $AnnoStagione;
        private $idStagione;

        function __construct($numStagione, $numEpisodio, $annoStagione, $idStagione)
        {
            $this-> NumStagione = $numStagione;
            $this-> NumEpisodio = $numEpisodio;
            $this-> AnnoStagione = $annoStagione;
            $this-> idStagione = $idStagione;
        }

        function getNumStagione(){
            return $this->NumStagione;
        }
        
        function getNumEpisodio(){
            return $this->NumEpisodio;
        }
        
        function getAnnoStagione(){
            return $this->AnnoStagione;
        }
        
        function getIdStagione(){
            return $this->idStagione;
        }
    }

    Class Episodio{
        private $Titolo;
        private $Durata;
        private $Descrizione;
        private $Img;

        public function __construct($titolo, $durata, $descrizione, $img)
        {
            $this-> Titolo = $titolo;
            $this-> Durata = $durata;
            $this-> Descrizione = $descrizione;
            $this-> Img = $img;
        }

        function getTitoloEpisodio(){
            return $this->Titolo;
        }
        
        function getDurataEpisodio(){
            return $this->Durata;
        }

        function getDescriozioneEpisodio(){
            return $this->Descrizione;
        }

        function getImgEpisodio(){
            return $this->Img;
        }
    }
?>