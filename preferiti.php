<?php

  require './includes/UtenteClass.php';
  require './includes/UtenteDAO.php';
  require './includes/CategoriaDAO.php';
  require './includes/CategoriaClass.php';

  $utente = new UtenteDAO();
  $categoria = new CategoriaDAO();
 
 
  session_start(); 

  $serieUtente = $utente -> GetSerieUtente($_SESSION['id']);

  if($_SESSION == null){

    header("location: index.php");

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

    <title>Preferiti</title>

    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="./js/index.js"></script>
</head>
<body class="bg-dark">
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a href="index.php"> <img class="logo" src="./img/logo.png" alt="logo"> </a> 
                <a class="navbar-brand" href="#">Curiosity TV Series</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">About us</a>
                    </li>
                    <?php if($_SESSION != null){ ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Preferiti</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">Logout</a>
                        </li>
                        
                    <?php }else{ ?>

                        <li class="nav-item">
                            <a class="nav-link" href="./register.php">Accedi</a>
                        </li>

                    <?php } ?>
                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    
    <section>
        <div class="container mt-5">
          <h2 class="testo text-start">Preferiti</h2>
          <div class="arrow">
            <div class="arrow-top"></div>
            <div class="arrow-bottom"></div>
          </div>
          <div class="row row-cols-auto">

            <?php for($i=0; $i < count($serieUtente); $i++){ ?>
              <div class="col mb-5 me-4">
                <a href="./serie.php?id=<?php echo $serieUtente[$i] -> getID() ?>">
                  <img src=" <?php echo $serieUtente[$i] -> getLocandina() ?> " class="radius-b locandine" alt="...">
                </a>
                <div class="card-body">
                  <h4 class="testo" style="width: 10rem;"> <?php echo $serieUtente[$i] -> getNome()  ?> </h4>
                  <p class="testo"> <?php echo ($serieUtente[$i] -> getAnnoI())  ?></p>

                  <?php  
                    $ID = $serieUtente[$i] -> getID();
                    $risCateg = $categoria -> getCateg($ID);
                  ?>                       
                          
                  <p class="testo" style="width: 10rem;">
                    <?php 
                      if($risCateg == null){

                        echo ("");

                      }else if(count($risCateg) < 2){ 

                        echo($risCateg[0] -> getCategNome());

                      }else{
                      
                        echo ($risCateg[0] -> getCategNome()." / ".$risCateg[1] -> getCategNome());

                      }
                    ?>
                  </p> 
                </div>
              </div>
            <?php } ?> 
          </div>
        </div>
    </section>
    
</body>
</html>