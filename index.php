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
              <a href="#"> <img class="logo" src="./img/logo.png" alt="logo"> </a> 
            <a class="navbar-brand" href="#">Curiosity TV Series</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#top">Top</a>
                </li>
                <li class="nav-item">
                  <a id="categorie" class="nav-link" onclick="functionCategorie(), functionSfocatura()">Categorie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#footer">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./register.php">Accedi</a>
                </li>
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
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
          </div>

          
          <div class="row row-cols-12 ms-5 mb-5">
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
          </div>

          
          <div class="row row-cols-12 ms-5 mb-5">
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
            <div class="col-3">
              <a href="#">
                <h5>Avventura</h5>
              </a>
            </div>
          </div>  
          
        </div>

      </section>

      <section>
        <div id="sezioneSfocatura" class="sfocatura hidden-no"></div>
      </section>


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
                <div class="carousel-inner ">
                  <div class="carousel-item active">

                 
                    <img src="./serieTv/ST/StOrizzontale.jpg" class="w-100 p-5 img-fluid d-block rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h1 class="testo fst-italic">Stranger Things</h1>
                      <h2 class="testo fst-italic">2017 - in corso...</h2>
                      <br>
                    </div>

                  </div>
                  <div class="carousel-item">

                    
                    <img src="./serieTv/witcher/witcherOrizzontale.jpg" class="w-100 p-5 img-fluid d-block rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h1 class="testo">The Witcher</h1>
                      <h2 class="testo fst-italic">2020 - in corso...</h2>
                      <br>
                    </div>

                  </div>
                  <div class="carousel-item">

                    
                    <img src="./serieTv/Vikings/VikingsOrizzontale.jpg" class="w-100 p-5 img-fluid d-block rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h1 class="testo">Vikings</h1>
                      <h2 class="testo fst-italic">2013 - 2021</h2>
                      <br>
                    </div>

                  </div>
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

      <?php

        require './includes/SerieDAO.php';
        require './includes/SerieClass.php';
        require './includes/CategoriaDAO.php';
        require './includes/CategoriaClass.php';

        $serie = new SerieDAO; 
        $categoria = new CategoriaDAO;
        $risultato = $serie -> getSerie(); 
       
      
      ?>

      <!-- Sezione Serie TV -->
      <div id="top"></div>
      <br>
      <section>
        <div class="container mt-5 me-5">
          <h2 class="testo text-start">Top</h2>
          <div class="row row-cols-auto">

            <?php for($i=0; $i < $num = $serie -> getNumSerie(); $i++){ ?>
              <div class="col mb-5 me-4">
                <a href="./serie.php?id=<?php echo $risultato[$i] -> getID() ?>">
                  <img src=" <?php echo $risultato[$i] -> getLocandina() ?> " class="radius-b locandine" alt="...">
                </a>
                <div class="card-body">
                  <h4 class="testo"> <?php echo $risultato[$i] -> getNome()  ?> </h4>
                  <p class="testo"> <?php echo ($risultato[$i] -> getAnnoI()." - ".$risultato[$i]->getAnnoF() )  ?></p>

                  <?php  
                    $ID = $risultato[$i] -> getID();
                    $risCateg = $categoria -> getCateg($ID);

                  ?>                       
                          
                  <p class="testo"> <?php echo ($risCateg[1] -> getCategNome()." / ".$risCateg[2] -> getCategNome()) ?> </p> 
                </div>
              </div>
            <?php } ?> 
          </div>
        </div>
      </section>

      
      <!--Sezione Footer-->
      <div id="footer"></div>
      <br>
      <section>
        <footer>
          <div class="container">
            <div class="row row-cols-auto">

              <div class="col-6">
                <a href="#">
                  <img class="logo mt-5" src="./img/logo.png" alt="">
                </a>
                <h3 class="testo">Curiosity TV Series</h3>
              </div>

              <div class="col-6">
                <h4 class="mt-5">I miei contatti</h4>

                <a href="https://www.linkedin.com/in/stefano-gagliarde-005aa4222/" class="link-footer" target="_blanck">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a> 

                <a href="https://github.com/GagliardeStefano" class="link-footer" target="_blanck">
                  <ion-icon name="logo-github"></ion-icon>
                </a>

                <a href="mailto:stefanogagliarde32@gmail.com" class="link-footer" target="_blanck">
                  <ion-icon name="at-outline"></ion-icon>
                </a>
              </div>

              
            </div>
          </div>
        </footer>
      </section>


      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/index.js"></script>
    
  </body>
</html>