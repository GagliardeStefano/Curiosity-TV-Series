<?php
    class UtenteDAO{

        public function insertUtente($nome, $cognome, $email, $password){
            
            require './partials/ConnectDB.php';

            $query = ("INSERT INTO utente VALUES('$email', '$password', '$nome', '$cognome')");
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
            
            $query =("SELECT * FROM utente WHERE mail='$email'");
            $ris = mysqli_query($mysqli, $query);

            while($row = mysqli_fetch_array($ris)){   

                $objUtente = new Utente($row['mail'],$row['passwd'],$row['nome'],$row['cognome']);
                return $objUtente;
            }
        }

        public function ChangePass($email, $newPasswd){

            require './partials/ConnectDB.php';

            $query = ("UPDATE utente SET passwd = '$newPasswd' WHERE mail = '$email'");
            mysqli_query($mysqli, $query);
        }



    }


?>