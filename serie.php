<?php   

    require "./includes/SerieDAO.php";
    require "./includes/SerieClass.php";
    require "./includes/CategoriaClass.php";
    require './includes/CategoriaDAO.php';

    $serie = new SerieDAO();
    $categoria = new CategoriaDAO;
    $AllCateg = $categoria -> getAllCateg();
        
    try{
        $getID = $_GET['id'];
        $ris = $serie -> getSerieID($getID);
    }catch(Exception $e){
        header("location: index.php");
    }
    
    $risCateg = $categoria -> getCateg($getID);
    $risNumCateg = $categoria -> getNumCateg($getID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $ris -> getNome()?> </title>

    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark">

    <header>
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
                    <a class="nav-link" href="#info">Informazioni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#stagioni">Stagioni</a>
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

    
    <!--Sezione Titolo & Voto-->
    <section >
        <div class="container">
            <div class="row row-cols-auto">
                <div class="col-4">
                    <div class="col">
                        <h1 class="testo">  <?php echo $ris -> getNome() ?></h1>
                        <p class="testo"> <?php echo $ris -> getAnnoI()?>  </p>
                    </div>

                    <div class="col-2" style="display: -webkit-box;">
                        
                        <h3 class="testo"> <?php echo $ris -> getVoto() ?> </h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Sezione Informazioni-->
    <section>
        <div class="container ">
            <div class="row row-cols-auto">

                <div class="col-12" style="text-align: center;">
                    <img src=" <?php echo $ris -> getimg()   ?> " class="img-fluid w-75" alt="...">
                </div>

                <div id="info" ></div>
                <br> <br>
                <section>    
                    <div class="container">
                        <div class="card-body">
                            <div class="row row-cols-auto">
                                <div class="col testo ">
                                    <h3>Trama</h3>
                                    <p> <?php echo $ris -> getTrama() ?> </p>
                                </div>

                                <div class="col testo mt-5">
                                    
                                    <h3>Categorie</h3>
                                    <div class="categ-serie">
                                        <?php for($i=0; $i < $risNumCateg; $i++){    ?>
                                            <a class="link-categ" href="categoria.php?id=<?php echo $risCateg[$i] -> getCategID() ?>">    
                                                <p> <?php echo $risCateg[$i] -> getCategNome()  ?> </p>
                                            </a>
                                        <?php } ?>  
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
          </div>
        </div>
    </section>

    <?php   ?>

    <!--Sezione Episodi-->
    <div id="stagioni"></div>
    <br>
    <section>
        <div class="container mt-5">
            <h2 class="testo text-start">Stagioni e Episodi | <p class="testo"> <?php echo $ris -> getNome() ?>  </p> </h2>
            <div class="row row-cols-auto ms-1">
                
                <div class="form-check testo">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Stagione 1
                    </label>
                </div>

                <div class="form-check testo">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Stagione 2
                    </label>
                </div>

                <div class="form-check testo">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                      Stagione 3
                    </label>
                </div>
            </div>

            <h6 class="testo mt-5">Anno: 2017</h6>

            <div class="row mt-5 row-cols-auto">

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body testo">
                            <div style="display: -webkit-box;" >
                                <h4>1. Segreti</h4>
                                <p class="position-absolute top-50 end-0 translate-middle-y mt-3">52min</p>
                            </div>
                            <p class="card-text">Nel 2019 la scomparsa di un ragazzino del posto provoca il terrore tra i residenti di Winden, piccola cittadina tedesca con una storia bizzarra e tragica.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body testo">
                            <div style="display: -webkit-box;" >
                                <h4>1. Segreti</h4>
                                <p class="position-absolute top-50 end-0 translate-middle-y mt-3">52min</p>
                            </div>
                            <p class="card-text">Nel 2019 la scomparsa di un ragazzino del posto provoca il terrore tra i residenti di Winden, piccola cittadina tedesca con una storia bizzarra e tragica.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body testo">
                            <div style="display: -webkit-box;" >
                                <h4>1. Segreti</h4>
                                <p class="position-absolute top-50 end-0 translate-middle-y mt-3">52min</p>
                            </div>
                            <p class="card-text">Nel 2019 la scomparsa di un ragazzino del posto provoca il terrore tra i residenti di Winden, piccola cittadina tedesca con una storia bizzarra e tragica.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body testo">
                            <div style="display: -webkit-box;" >
                                <h4>1. Segreti</h4>
                                <p class="position-absolute top-50 end-0 translate-middle-y mt-3">52min</p>
                            </div>
                            <p class="card-text">Nel 2019 la scomparsa di un ragazzino del posto provoca il terrore tra i residenti di Winden, piccola cittadina tedesca con una storia bizzarra e tragica.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body testo">
                            <div style="display: -webkit-box;" >
                                <h4>1. Segreti</h4>
                                <p class="position-absolute top-50 end-0 translate-middle-y mt-3">52min</p>
                            </div>
                            <p class="card-text">Nel 2019 la scomparsa di un ragazzino del posto provoca il terrore tra i residenti di Winden, piccola cittadina tedesca con una storia bizzarra e tragica.</p>
                        </div>
                    </div>
                </div> 
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
</body>
</html>