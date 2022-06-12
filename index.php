<?php

  session_start();
  require './includes/SerieDAO.php';
  require './includes/SerieClass.php';
  require './includes/CategoriaDAO.php';
  require './includes/CategoriaClass.php';

  $serie = new SerieDAO(); 
  $categoria = new CategoriaDAO();
  $risultato = $serie -> getSerie(); 
       
  $AllCateg = $categoria -> getAllCateg();
      
?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>CuriosityTvSeries</title>
    </head>

    <body class="bg-dark">

    <header>

      <!--Navbar-->
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
                <a class="nav-link active" aria-current="page" href="#top">Top</a>
              </li>
              <li class="nav-item">
                <a id="categorie" class="nav-link" onclick="functionCategorie()">Categorie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">About us</a>
              </li>
              <?php if($_SESSION != null){ ?>

                <li class="nav-item">
                    <a class="nav-link" href="preferiti.php">Preferiti</a>
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

      
    <!--Sezione Banner Categorie-->
    <section>
    <div id="sezioneCategoria" class="categorie hidden-no">
      <div class="ms-5">
        <h2>Categorie</h2>
        <button onclick="functionCategorieNo(), functionSfocaturaNo()" type="button" class="btn-close" aria-label="Close"></button>
      </div>
            
      <div class="row row-cols-12 ms-5 mb-5 mt-5">
        <?php for($i=0; $i < count($AllCateg); $i++){ ?>

          <div class="col-3 mb-2">
            <a href="categoria.php?id=<?php echo $AllCateg[$i] -> getCategID() ?>">
              <h5><?php echo $AllCateg[$i] -> getCategNome() ?> </h5>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>


    <?php       
      $carosello1 = $serie -> get1SerieCarousel();
    ?>
     <!--Sezione Carousel-->
      <section>
        <div class="container ">
          <div class="row">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                  <?php for($z=0; $z < 1; $z++){ ?>

                    <div class="carousel-item active">
                      <a href="./serie.php?id=<?php echo $carosello1[0] -> getID() ?>"><img src="<?php echo $carosello1[0] -> getimg() ?>" class="w-100 p-5 img-fluid d-block rounded" alt="..."></a>
                      <div class="carousel-caption d-none d-md-block">
                        <h1 class="testo fst-italic"><?php echo $carosello1[0] -> getNome() ?></h1>
                        <h2 class="testo fst-italic"><?php echo $carosello1[0] -> getAnnoI() ?></h2>
                        <br>
                      </div>
                    </div>
          
                    <div class="carousel-item">
                      <a href="./serie.php?id=<?php echo $carosello1[1] -> getID() ?>"><img src="<?php echo $carosello1[1] -> getimg() ?>" class="w-100 p-5 img-fluid d-block rounded" alt="..."></a>
                      <div class="carousel-caption d-none d-md-block">
                        <h1 class="testo fst-italic"><?php echo $carosello1[1] -> getNome() ?></h1>
                        <h2 class="testo fst-italic"><?php echo $carosello1[1] -> getAnnoI() ?></h2>
                        <br>
                      </div>
                    </div>

                  
                    <div class="carousel-item ">
                      <a href="./serie.php?id=<?php echo $carosello1[2] -> getID() ?>"><img src="<?php echo $carosello1[2] -> getimg() ?>" class="w-100 p-5 img-fluid d-block rounded" alt="..."></a>
                      <div class="carousel-caption d-none d-md-block">
                        <h1 class="testo fst-italic"><?php echo $carosello1[2] -> getNome() ?></h1>
                        <h2 class="testo fst-italic"><?php echo $carosello1[2] -> getAnnoI() ?></h2>
                        <br>
                      </div>
                    </div>

                  <?php } ?>

                </div>
                <button class="carousel-control-prev frecce" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next frecce" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </div>
        </div>
      </section>

      
      <!-- Sezione Serie TV TOP -->
      <div id="top"></div>
      <br>
      <section>
        <div class="container mt-5">
          <h2 class="testo text-start">Top</h2>
          <div class="arrow">
            <div class="arrow-top"></div>
            <div class="arrow-bottom"></div>
          </div>
          <div class="row row-cols-auto">

            <?php for($i=0; $i < $num = count($risultato); $i++){ ?>
              <div class="col mb-5 me-4">
                <a href="./serie.php?id=<?php echo $risultato[$i] -> getID() ?>">
                  <img src=" <?php echo $risultato[$i] -> getLocandina() ?> " class="radius-b locandine" alt="...">
                </a>
                <div class="card-body">
                  <h4 class="testo" style="width: 10rem;"> <?php echo $risultato[$i] -> getNome()  ?> </h4>
                  <p class="testo"> <?php echo ($risultato[$i] -> getAnnoI())  ?></p>

                  <?php  
                    $ID = $risultato[$i] -> getID();
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

      <?php $SerieAmericane = $serie -> getSerieIndexCateg(5); ?>

      <!-- Sezione Serie TV Americane -->
      <section>
        <div class="container mt-5">
          <h2 class="testo text-start">Serie Tv Americane</h2>
          <div class="row row-cols-auto">

            <?php for($i=0; $i < count($SerieAmericane); $i++){ ?>
              <div class="col mb-5 me-4">
                <a href="./serie.php?id=<?php echo $SerieAmericane[$i] -> getSerieID() ?>">
                  <img src=" <?php echo $SerieAmericane[$i] -> getSerieLocandina() ?> " class="radius-b locandine" alt="...">
                </a>
                <div class="card-body">
                  <h4 class="testo" style="width: 10rem;"> <?php echo $SerieAmericane[$i] -> getSerieNome()  ?> </h4>
                  <p class="testo"> <?php echo ($SerieAmericane[$i] -> getSerieAnnoInizio())  ?></p>

                  <?php  
                    $ID = $SerieAmericane[$i] -> getSerieID();
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


      <?php $SerieHorror = $serie -> getSerieIndexCateg(17); ?>

      <!-- Sezione Serie TV Horror -->
      <section>
        <div class="container mt-5">
          <h2 class="testo text-start">Serie Tv Horror</h2>
          <div class="row row-cols-auto">

            <?php for($i=0; $i < count($SerieHorror); $i++){ ?>
              <div class="col mb-5 me-4">
                <a href="./serie.php?id=<?php echo $SerieHorror[$i] -> getSerieID() ?>">
                  <img src=" <?php echo $SerieHorror[$i] -> getSerieLocandina() ?> " class="radius-b locandine" alt="...">
                </a>
                <div class="card-body">
                  <h4 class="testo" style="width: 10rem;"> <?php echo $SerieHorror[$i] -> getSerieNome()  ?> </h4>
                  <p class="testo"> <?php echo ($SerieHorror[$i] -> getSerieAnnoInizio())  ?></p>

                  <?php  
                    $ID = $SerieHorror[$i] -> getSerieID();
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


      <?php $SerieFumetti = $serie -> getSerieIndexCateg(3); ?>

      <!-- Sezione Serie TV Tratte da fumetti -->
      <section>
        <div class="container mt-5">
          <h2 class="testo text-start">Serie Tv Tratte da fumetti</h2>
          <div class="row row-cols-auto">

            <?php for($i=0; $i < count($SerieFumetti); $i++){ ?>
              <div class="col mb-5 me-4">
                <a href="./serie.php?id=<?php echo $SerieFumetti[$i] -> getSerieID() ?>">
                  <img src=" <?php echo $SerieFumetti[$i] -> getSerieLocandina() ?> " class="radius-b locandine" alt="...">
                </a>
                <div class="card-body">
                  <h4 class="testo" style="width: 10rem;"> <?php echo $SerieFumetti[$i] -> getSerieNome()  ?> </h4>
                  <p class="testo"> <?php echo ($SerieFumetti[$i] -> getSerieAnnoInizio())  ?></p>

                  <?php  
                    $ID = $SerieFumetti[$i] -> getSerieID();
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
      
    <!--Sezione Footer-->
    <?php require './partials/footer.php' ?>

      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/index.js"></script>
    
  </body>
</html>