<?php
    class UtenteDAO{

        public function insertUtente($nome, $cognome, $email, $password){
            
            require './partials/ConnectDB.php';

            $query = ("INSERT INTO utente (mail, passwd, nome, cognome) VALUES('$email', '$password', '$nome', '$cognome')");
            mysqli_query($mysqli, $query);

        }
        
        public function existMail($email){

            require './partials/ConnectDB.php';

            $query = ("SELECT mail FROM utente WHERE mail = '$email'");
            $ris = mysqli_query($mysqli, $query);
            
            if($ris -> num_rows > 0){
                return true;
            }else{
                return false;
            }
        }

        public function exist($email, $password){

            require './partials/ConnectDB.php';
            
            $query = ("SELECT mail, passwd FROM utente WHERE mail='$email' AND passwd = '$password'");
            $ris = mysqli_query($mysqli, $query);

            if($ris -> num_rows > 0){
                return true;
            }else{
                return false;
            }
        
        }

        public function getUtente($email){
            require './partials/ConnectDB.php';
            
            $query =("SELECT idUtente FROM utente WHERE mail='$email'");
            $ris = mysqli_query($mysqli, $query);

            while($row = mysqli_fetch_array($ris)){   

                $objUtente = $row['idUtente'];
                return $objUtente;
            }
        }

        public function ChangePass($email, $newPasswd){

            require './partials/ConnectDB.php';
            
            $query = ("UPDATE utente SET passwd = '$newPasswd' WHERE mail = '$email'");
            mysqli_query($mysqli, $query);
        }



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
    }


?>