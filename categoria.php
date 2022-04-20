<?php 

  require './includes/CategoriaDAO.php';
  require './includes/CategoriaClass.php';
  require './includes/SerieDAO.php';
  require './includes/SerieClass.php';

  $categoria = new CategoriaDAO;
  $getID = $_GET['id'];

  
  $num = $categoria -> getAllNum();
  $AllCateg = $categoria -> getAllCateg();
  $Nome = $categoria -> getCategID($getID);
  $SerieCateg = $categoria -> getSerieCateg($getID);
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $Nome -> getCategNome() ?> </title>

    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a id="categorie" class="nav-link" onclick="functionCategorie(), functionSfocatura()">Categorie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./register.html">Accedi</a>
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
        <?php for($i=0; $i < $num; $i++){ ?>

          <div class="col-3 mb-2">
            <a href="categoria.php?id=<?php echo $AllCateg[$i] -> getCategID() ?>">
              <h5><?php echo $AllCateg[$i] -> getCategNome() ?> </h5>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <section>
    <div id="sezioneSfocatura" class="sfocatura hidden-no"></div>
  </section>


  <!--Sezione Serie TV-->
  <section>
    <div class="container mt-5 me-5">
      <h2 class="testo text-start">Categoria: <?php echo $Nome -> getCategNome(); ?> </h2>
      <div class="row row-cols-auto">


      <?php for($i=0; $i < count($SerieCateg); $i++){ ?>
        <div class="col mb-5 me-4 mt-4">
          <a href="serie.php?id=<?php echo $SerieCateg[$i] -> getSerieID() ?>">
            <img src="<?php echo $SerieCateg[$i] -> getSerieLocandina() ?>" class="radius-b locandine zoom" alt="...">
          </a>
          <div class="card-body">
            <h4 class="testo"> <?php echo $SerieCateg[$i] -> getSerieNome() ?> </h4>
            <p class="testo"><?php echo $SerieCateg[$i] -> getSerieAnnoInizio()." - ".$SerieCateg[$i] -> getSerieAnnoFine() ?> </p>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>



  <!--Sezione footer-->
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