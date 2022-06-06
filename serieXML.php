<?php

    header("Content-type: application/xml");

    require './includes/EpisodiClass.php';
    require './includes/EpisodiDAO.php';

    $serie = new EpisodiDAO();
    $episodi = $serie -> GetEpisodi($_GET['idStagione']);


    echo "<Episodi>";
    for($i=0; $i<count($episodi); $i++){
        echo "<Episodio>";
            echo "<Titolo> " .$episodi[$i] -> getTitoloEpisodio(). " </Titolo>";
            echo "<Durata> " .$episodi[$i] -> getDurataEpisodio(). " </Durata>";
            echo "<Descrizione> " .$episodi[$i] -> getDescriozioneEpisodio(). " </Descrizione>";
            echo "<Img> " .$episodi[$i] -> getImgEpisodio(). " </Img>";
        echo "</Episodio>";
    }
    echo "</Episodi>";
           
?>