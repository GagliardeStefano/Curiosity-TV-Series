<?php

    Class CategoriaDAO {
        
        public function getCateg($id){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("SELECT * FROM serie_categoria JOIN categoria ON serie_categoria.idCateg1 = categoria.idCateg WHERE idSerie1=$id");
            $res = mysqli_query($mysqli, $query);

            $arrayCateg = [];

            for($i=0; $i < $row = mysqli_fetch_array($res); $i++){
                $objCateg = new Categoria($row['idCateg1'], $row['nome']);
                array_push($arrayCateg, $objCateg);
            }
            return $arrayCateg;
        }

        public function getNumCateg($id){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("SELECT * FROM serie_categoria JOIN categoria ON serie_categoria.idCateg1 = categoria.idCateg WHERE idserie1=$id");
            $res = mysqli_query($mysqli, $query);

            return $res -> num_rows;
        }

    }


?>