<?php
    class UtenteDAO{
        
        public function existMail($email){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("SELECT mail FROM utente WHERE mail = $email");
            $ris = mysqli_query($mysqli, $query);
     
            return $ris -> num_rows > 0;
           
        }

        public function exist($email, $password){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }
            
            $query = ("SELECT mail, passwd FROM utente WHERE mail=$email AND passwd = $password");
            $ris = mysqli_query($mysqli, $query);

            return $ris -> num_rows > 0;
        
        }

        public function getUtente($email){
            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }
            
            $query =("SELECT * FROM utente WHERE mail=$email");
            $ris = mysqli_query($mysqli, $query);

            while($row = mysqli_fetch_array($ris)){   

                $objUtente = new Utente($row['mail'],$row['passwd'],$row['nome'],$row['cognome']);
                return $objUtente;
            }
        }

        public function ChangePass($email, $newPasswd){

            $url = "localhost";
            $user = "root";
            $pass = "gagliarde";
            $db = "ctvs";

            $mysqli = new mysqli($url, $user, $pass, $db);

            if($mysqli -> connect_errno){
                echo ("Errore: ".$mysqli -> connect_error);
            }

            $query = ("UPDATE utente SET passwd = $newPasswd WHERE mail = $email");
            mysqli_query($mysqli, $query);
        }



    }


?>