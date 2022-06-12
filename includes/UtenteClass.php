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
?>