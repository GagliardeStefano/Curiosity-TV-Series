<?php 

  session_start();
  require './includes/CategoriaDAO.php';
  require './includes/CategoriaClass.php';
  require './includes/SerieDAO.php';
  require './includes/SerieClass.php';

  $categoria = new CategoriaDAO;
  $getID = $_GET['id'];

  
  
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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
            <h4 class="testo col" style="width: 10rem;"> <?php echo $SerieCateg[$i] -> getSerieNome() ?> </h4>
            <p class="testo col"> <?php echo $SerieCateg[$i] -> getSerieVoto() ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill star-categ" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg>
            </p>
            <p class="testo"><?php echo $SerieCateg[$i] -> getSerieAnnoInizio() ?> </p>
          </div>

        </div>
      <?php } ?>
      </div>
    </div>
  </section>


  <!--Sezione footer-->
  <?php require './partials/footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
  <script src="./js/index.js"></script>

</body>
</html>