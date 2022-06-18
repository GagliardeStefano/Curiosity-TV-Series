<?php

  require './includes/SeriePreferiteDAO.php';
  require './includes/SeriePreferiteClass.php';
  require './includes/CategoriaDAO.php';
  require './includes/CategoriaClass.php';

  $seriePrefe = new SeriePreferiteDAO();
  $categoria = new CategoriaDAO();
 
 
  session_start(); 

  $serieUtente = $seriePrefe -> GetSerieUtente($_SESSION['id']);

  if($_SESSION == null){

    header("location: index.php");

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Preferiti</title>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
                            <a class="nav-link" href="./login.php">Accedi</a>
                        </li>

                    <?php } ?>
                    </ul>
                    <form class="d-flex">
                      <a style="text-decoration: none;" href="#">
                        <input id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      </a>
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="float-end bg-light" id="display" style="width: 100%;"></div>

    <?php if($serieUtente != null){ ?>
      
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
                  <a href="./serie.php?id=<?php echo $serieUtente[$i] -> getIdSerieUtente() ?>">
                    <img src=" <?php echo $serieUtente[$i] -> getLocandinaSerieUtente() ?> " class="radius-b locandine" alt="...">
                  </a>
                  <div class="card-body">
                    <h4 class="testo" style="width: 10rem;"> <?php echo $serieUtente[$i] -> getNomeSerieUtente()  ?> </h4>
                    <p class="testo"> <?php echo ($serieUtente[$i] -> getAnnoSerieUtente())  ?></p>

                    <?php  
                      $ID = $serieUtente[$i] -> getIdSerieUtente();
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

    <?php }else{ ?>

      <div class="container">
        <div class="row row-cols-auto">
          <div class="d-grid m-auto">
            <p style="margin-top: 8rem;" class="fs-1 text-light">Al momento non hai nessun preferito</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-heartbreak-fill m-auto svgHeart" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
            </svg>
          </div>
        </div>
      </div>
      
    <?php } ?>  
    
    <!--Footer-->
    <?php require './partials/footer.php' ?>

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/index.js"></script>
</body>
</html>