
<?php

    $con = new mysqli("localhost", "root", "gagliarde", "ctvs");

    $row = 1;
    if (($handle = fopen("DatiSerie2.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            echo "<p> fields in line $row: <br /></p>\n";
            $row++;

            for ($c=0; $c < count($data); $c++) {
                echo $data[$c] . "<br />\n";
            }
            $query = ("INSERT INTO serie (idSerie, nome, trama, locandina, voto, anno_inizio, img_orizzontale) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]')");
                mysqli_query($con, $query);
                echo"Inserimento...";
        }
        fclose($handle);
    }
?>
