<?php

    require './partials/ConnectDB.php';
    require './includes/SeriePreferiteClass.php';
    require './includes/SeriePreferiteDAO.php';

    $SeriePrefe = new SeriePreferiteDAO();


    $idSerie = $_GET['idSerie'];
    session_start();
    
    if($_SESSION == null){

        header("location: index.php");

    }else{


        $exist = $SeriePrefe -> ExistSerieUtente($_SESSION['id'], $idSerie);

        if($exist == true){

            
            $SeriePrefe -> DeliteSeriePrefe($_SESSION['id'], $idSerie);
            header("location: serie.php?id=$idSerie");

        }else{

            $SeriePrefe -> InsertSerieUtente($_SESSION['id'], $idSerie);
            header("location: serie.php?id=$idSerie");
        }
    }
    
?>