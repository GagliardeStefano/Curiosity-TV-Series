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


?>