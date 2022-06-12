<?php 

    Class SeriePreferiteDAO{


        public function GetSerieUtente($idUtente){
           
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM utente_serie JOIN serie ON utente_serie.idSerie = serie.idSerie WHERE utente_serie.IdUtente = '$idUtente' ");
            $ris = mysqli_query($mysqli, $query);

            $array = [];

            for($i=0; $i<$row = mysqli_fetch_array($ris); $i++){

                $obj = new SerieUtente($row['idSerie'], $row['nome'], $row['locandina'], $row['voto'], $row['anno_inizio']);
                array_push($array, $obj);
            }

            return $array;
        }

        public function ExistSerieUtente($idUtente, $idSerie)
        {
            
            require './partials/ConnectDB.php';

            $query = ("SELECT * FROM utente_serie JOIN serie ON utente_serie.idSerie = serie.idSerie WHERE utente_serie.IdUtente = '$idUtente' AND utente_serie.IdSerie = '$idSerie' ");
            $ris = mysqli_query($mysqli, $query);

            if($ris -> num_rows > 0){

                return true;

            }else{

                return false;

            }
        }

        public function InsertSerieUtente($idUtente, $idSerie){

            require './partials/ConnectDB.php';

            $query = ("INSERT INTO utente_serie VALUES ('$idSerie','$idUtente') ");
            mysqli_query($mysqli, $query);

        }

        public function DeliteSeriePrefe($idUtente, $idSerie)
        {
            
            require './partials/ConnectDB.php';

            $query = ("DELETE FROM utente_serie WHERE IdUtente = '$idUtente' AND IdSerie = '$idSerie' ");
            mysqli_query($mysqli, $query);
        }

    }
?>