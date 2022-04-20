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

            $query = ("SELECT * FROM serie_categoria JOIN categoria ON serie_categoria.idCateg1 = categoria.idCateg WHERE idSerie1=$id");
            $res = mysqli_query($mysqli, $query);

            return $res -> num_rows;
        }

        public function getSerieCateg($idCategoria){
            
            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("SELECT * FROM serie_categoria JOIN serie on serie_categoria.idSerie1 = serie.idSerie WHERE idCateg1 = $idCategoria");
            $ris = mysqli_query($mysqli, $query);

            $arraySerieCateg = [];

            for($i=0; $i < $row = mysqli_fetch_array($ris); $i++){
                $objCateg = new SerieCateg($row['idSerie'], $row['nome'], $row['locandina'], $row['anno_inizio'], $row['anno_fine']);
                array_push($arraySerieCateg, $objCateg);
            }
            return $arraySerieCateg;
        }
    }


?>