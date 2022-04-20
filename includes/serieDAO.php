<?php

    Class SerieDAO{

        public function getSerie(){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("SELECT * FROM serie");
            $res = mysqli_query($mysqli, $query);

            $arraySerie=[];

            for($i=0; $i<$row = mysqli_fetch_array($res); $i++){
                
                $oSerie = new Serie($row['idSerie'], $row['nome'], $row['trama'], $row['locandina'], $row['voto'], $row['anno_inizio'], $row['anno_fine'], $row['img_orizzontale']);
                array_push($arraySerie, $oSerie);
            }
            return $arraySerie;
        }

        public function getNumSerie(){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $selectNum = ("SELECT * FROM serie");
            $res = mysqli_query($mysqli, $selectNum);

            return $res -> num_rows;
        }

        public function getSerieID($id){
            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("SELECT * FROM serie WHERE idSerie=$id");
            $res = mysqli_query($mysqli, $query);

            if($res -> num_rows == 0){
                
                throw new Exception();

            }else{
                
                while($row = mysqli_fetch_array($res)){
                    $SerieConID = new Serie($row['idSerie'],$row['nome'], $row['trama'], $row['locandina'], $row['voto'], $row['anno_inizio'], $row['anno_fine'], $row['img_orizzontale']);
                    return $SerieConID;
                }
            }
        }    
        
    }
    
?>