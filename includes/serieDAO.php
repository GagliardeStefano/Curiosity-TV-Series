<?php

    Class serieDAO{

        public function getSerie(){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";


            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo "Errore: ".$mysqli -> connect_error;
            }

            $query = ("SELECT * FROM serie WHERE id = 2");
            $res = mysqli_query($mysqli, $query);
    
            while($row = mysqli_fetch_array($res)){

                $this -> id_serie = $row['id'];
                $this -> nome = $row['nome'];
                $this -> trama = $row['trama'];
                $this -> locandina = $row['locandina'];
                $this -> voto = $row['voto'];
                $this -> annoI = $row['anno_inizio'];
                $this -> annoF = $row['anno_fine'];
                $this -> img = $row['img_orizzontale'];

            }
        }
    }
    
?>