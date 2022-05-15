<?php

    Class EpisodiDAO{

        public function GetNumStagioni($IdSerie)
        {
            require './partials/ConnectDB.php';

            $query = ("SELECT NumStagione FROM serie_stagioni WHERE IdSerie = '$IdSerie' ");
            $res = mysqli_query($mysqli, $query);

            for($i=0; $i < $row = mysqli_fetch_array($res); $i++){
                
            }
        }
    }
?>