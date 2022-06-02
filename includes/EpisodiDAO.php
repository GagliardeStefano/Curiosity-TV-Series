<?php

    Class EpisodiDAO{

        public function GetNumStagioni($IdSerie){
            require './partials/ConnectDB.php';
            
            $query = ("SELECT * FROM serie_stagioni WHERE IdSerie = '$IdSerie' ");
            $res = mysqli_query($mysqli, $query);

            return $res -> num_rows;
        }

        public function GetNumEpisodi($idStagione){
            require './partials/ConnectDB.php';
            
            $query = ("SELECT * FROM serie_episodi WHERE IdStagione = '$idStagione' ");
            $res = mysqli_query($mysqli, $query);

            return $res -> num_rows;
        }

        public function GetStagioni($IdSerie)
        {
            require './partials/ConnectDB.php';

            $query = ("SELECT NumStagione, NumEpisodi, AnnoStagione, idStagione FROM serie_stagioni WHERE IdSerie = '$IdSerie' ");
            $res = mysqli_query($mysqli, $query);

            $arrayStagioni = [];

            for($i=0; $i < $row = mysqli_fetch_array($res); $i++){
                $objStagioni = new Stagioni($row['NumStagione'], $row['NumEpisodi'], $row['AnnoStagione'], $row['idStagione']);
                array_push($arrayStagioni, $objStagioni);
            }

            return $arrayStagioni;
        }

        public function GetEpisodi($idStagione)
        {
            require './partials/ConnectDB.php';

            $query = ("SELECT Titolo, Durata, Descrizione, Img FROM serie_episodi WHERE IdStagione = '$idStagione'");
            $res = mysqli_query($mysqli, $query);

            $arrayEpisodi = [];

            for($i=0; $i < $row = mysqli_fetch_array($res); $i++){
                $objEpisodi = new Episodio($row['Titolo'], $row['Durata'], $row['Descrizione'], $row['Img']);
                array_push($arrayEpisodi, $objEpisodi);
            }

            return $arrayEpisodi;
        }
    }
?>