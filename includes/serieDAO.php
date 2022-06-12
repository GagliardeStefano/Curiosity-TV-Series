<?php

    Class SerieDAO{

        public function getSerie(){

            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM serie WHERE voto >= 8 LIMIT 10");
            $res = mysqli_query($mysqli, $query);

            $arraySerie=[];

            for($i=0; $i<$row = mysqli_fetch_array($res); $i++){
                
                $oSerie = new Serie($row['idSerie'], $row['nome'], $row['trama'], $row['locandina'], $row['voto'], $row['anno_inizio'], $row['img_orizzontale']);
                array_push($arraySerie, $oSerie);
            }
            
            return $arraySerie;
        }

        public function getSerieID($id){
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM serie WHERE idSerie='$id'");
            $res = mysqli_query($mysqli, $query);

            if($res -> num_rows == 0){
                
                throw new Exception();

            }else{
                
                while($row = mysqli_fetch_array($res)){
                    $SerieConID = new Serie($row['idSerie'],$row['nome'], $row['trama'], $row['locandina'], $row['voto'], $row['anno_inizio'],$row['img_orizzontale']);
                    return $SerieConID;
                }
            }
        }    

        public function get1SerieCarousel(){
            require './partials/ConnectDB.php';

            $query = ("SELECT idSerie, nome, anno_inizio, img_orizzontale FROM serie ORDER BY rand() limit 3");
            $res = mysqli_query($mysqli, $query);

            $array = [];
            for($i=0; $i<$row = mysqli_fetch_array($res); $i++){
                $objCarousel = new Serie($row['idSerie'],$row['nome'],"","","",$row['anno_inizio'],$row['img_orizzontale']);
                array_push($array, $objCarousel);
            }

            return $array;
        }

        
        public function getSerieIndexCateg($idCategoria){
            
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM serie_categoria JOIN serie on serie_categoria.IdSerie = serie.idSerie WHERE IdCategoria = '$idCategoria' LIMIT 10");
            $ris = mysqli_query($mysqli, $query);

            $arraySerieCateg = [];

            for($i=0; $i < $row = mysqli_fetch_array($ris); $i++){
                $objCateg = new SerieCateg($row['idSerie'], $row['nome'], $row['locandina'], $row['anno_inizio'], $row['voto']);
                array_push($arraySerieCateg, $objCateg);
            }
            return $arraySerieCateg;
        }
    }
    
?>