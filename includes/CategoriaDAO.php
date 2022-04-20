<?php

    Class CategoriaDAO {

        //Prende le categorie che fanno parte di una serie TV
        public function getCateg($id){

            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM serie_categoria JOIN categoria ON serie_categoria.idCateg1 = categoria.idCateg WHERE idSerie1=$id");
            $res = mysqli_query($mysqli, $query);

            $arrayCateg = [];

            for($i=0; $i < $row = mysqli_fetch_array($res); $i++){
                $objCateg = new Categoria($row['idCateg1'], $row['nome']);
                array_push($arrayCateg, $objCateg);
            }
            return $arrayCateg;
        }

        //Prende il numero di categorie di una serie TV
        public function getNumCateg($id){

            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM serie_categoria JOIN categoria ON serie_categoria.idCateg1 = categoria.idCateg WHERE idSerie1=$id");
            $res = mysqli_query($mysqli, $query);

            return $res -> num_rows;
        }

        //Prende tutte le serie TV che fanno parte di una categoria
        public function getSerieCateg($idCategoria){
            
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM serie_categoria JOIN serie on serie_categoria.idSerie1 = serie.idSerie WHERE idCateg1 = $idCategoria");
            $ris = mysqli_query($mysqli, $query);

            $arraySerieCateg = [];

            for($i=0; $i < $row = mysqli_fetch_array($ris); $i++){
                $objCateg = new SerieCateg($row['idSerie'], $row['nome'], $row['locandina'], $row['anno_inizio'], $row['anno_fine']);
                array_push($arraySerieCateg, $objCateg);
            }
            return $arraySerieCateg;
        }

        //Prende tutte le categorie
        public function getAllCateg(){
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM categoria");
            $ris = mysqli_query($mysqli, $query);

            $arrayAllC = [];
            for($i=0; $i < $row = mysqli_fetch_array($ris); $i++){
                $objAllCategorie = new Categoria($row['idCateg'], $row['nome']);
                array_push($arrayAllC, $objAllCategorie);
            }
            return $arrayAllC;
        }   

        //Prende il numero di tutte le categorie
        public function getAllNum(){
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM categoria");
            $ris = mysqli_query($mysqli, $query);

            return $ris -> num_rows;
        }

        //Prendo la categoria in base all'ID
        public function getCategID($id){
            require './partials/ConnectDB.php';

            $query = ("SELECT idCateg, nome FROM categoria WHERE idCateg=$id");
            $ris = mysqli_query($mysqli, $query);

            for($i=0; $i < $row = mysqli_fetch_array($ris); $i++){
                $objCategoria = new Categoria($row['idCateg'], $row['nome']);
            }
            return $objCategoria;
        }
    }


?>