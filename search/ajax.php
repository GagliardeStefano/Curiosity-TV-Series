<html>
    <head>
        <link rel="stylesheet" href="./css/style.css">
    </head>
</html>
<?php

    $url = "localhost";
    $user = "root";
    $pass = "gagliarde";
    $db = "ctvs";

    $mysqli = new mysqli($url, $user, $pass, $db);

    if($mysqli -> connect_errno){
        echo ("Errore: ".$mysqli -> connect_error);
    }

    if(isset($_POST['search'])){

        $nomeSerie = $_POST['search'];

        $query = ("SELECT idSerie, nome, locandina, anno_inizio, voto, trama FROM serie WHERE nome LIKE '%$nomeSerie%' LIMIT 5 ");

        $ris = mysqli_query($mysqli, $query);

        echo '
            <ul class="list-group list-group-flush">
        ';

        while($row = mysqli_fetch_array($ris)){
            ?>

            <li class="list-group-item list-group-item-secondary liAjax" onclick="fill(<?php echo $row['nome']?>)">


                <div class="container testo">
                    <div class="row row-cols-auto">
                        <a class="linkAjax" href="./serie.php?id=<?php echo $row['idSerie'] ?>"><img src="<?php echo $row['locandina'] ?>" style="width: 9rem;"> </a>
                        <div class="mt-1">

                            <h4><?php echo $row['nome'] ?></h4>
                                
                            <p><?php echo "Anno: ".$row['anno_inizio'] ?></p>

                            <div class="d-flex">                                        
                                <p><?php echo $row['voto'] ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill starAjax" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </div>
                                
                        
                            <div>
                                <p style="width: 70rem;"><?php echo $row['trama'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        
            </li>

            <?php
        }
    }

?>

</ul>

<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>