<?php

    Class Utente{

        private $nome;
        private $cognome;
        private $mail;
        private $paswd;
        
        function __construct($nome, $cognome, $email, $password)
        {
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->email = $email;
            $this->password = $password;
        }


        public function getNome(){
            return $this->nome;
        }

        public function getCognome(){
         
            return $this->cognome;
        }

        public function getMail(){
            return $this->mail;
        }

        public function getPaswd(){
            return $this->paswd;
        }
    }


    Class getUtente{

        private $idUtente;

        function __construct($idUtente){

            $this->idUtente = $idUtente;
        }

        public function getIdUtente(){
            return $this->idUtente;
        }
    }

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