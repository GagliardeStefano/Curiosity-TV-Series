
<?php

    $con = new mysqli("localhost", "root", "gagliarde", "ctvs");

    $row = 1;
    if (($handle = fopen("DatiSerieEpisodi2.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            echo "<p> fields in line $row: <br /></p>\n";
            $row++;

            for ($c=0; $c < count($data); $c++) {
                echo $data[$c] . "<br />\n";
            }
            $query = ("INSERT INTO serie_episodi (IdEpisodio, Titolo, Durata, Descrizione, Img, IdStagione) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]')");
                mysqli_query($con, $query);
                echo"Inserimento...";
        }
        fclose($handle);
    }
?>
