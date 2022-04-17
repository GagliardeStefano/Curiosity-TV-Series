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

            $query = ("SELECT * FROM serie WHERE id = 2");
            $res = mysqli_query($mysqli, $query);

            while($row = mysqli_fetch_array($res)){
                
                $oSerie = new Serie($row['id'], $row['nome'], $row['trama'], $row['locandina'], $row['voto'], $row['anno_inizio'], $row['anno_fine'], $row['img_orizzontale']);
                return $oSerie;
            }
        }

        
    }
    
?>