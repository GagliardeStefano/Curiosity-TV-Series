<?php  
  
    session_start();

    header('Content-type: text/html; charset=utf-8');

    require './includes/SerieDAO.php';
    require './includes/SerieClass.php';
    require './includes/CategoriaClass.php';
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

    <title> <?php echo $ris -> getNome()?> </title>

    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="./js/index.js"></script>
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
                <a class="nav-link active" aria-current="page" href="#info">Informazioni</a>
              </li>
              <li class="nav-item">
                <a id="categorie" class="nav-link" href="#stagioni">Stagioni</a>
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

    
    <!--Sezione Titolo & Voto-->
    <section >
        <div class="container">
            <div class="row row-cols-auto">
                <div class="col-12">
                    <div class="col-8">
                        <h1 class="testo" style="width: 30rem;">  <?php echo $ris -> getNome() ?></h1>
                        <p class="testo"> <?php echo $ris -> getAnnoI()?>  </p>
                    </div>

                    <div class="col-2" style="display: -webkit-box;">
                        
                        <h3 class="testo"> <?php echo $ris -> getVoto() ?> </h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        
                    </div>

                    <?php if($_SESSION == null){ ?>

                        <div class="col-2" style="float: right;">      
                            <button type="button" style="display: contents;" id="liveToastBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak-fill likeNo like" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div id="liveToast" style="z-index: 10;" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                <img src="./img/logo.png" style="width: 1rem;" class="rounded me-2">
                                <strong class="me-auto">Curiosity TV Series</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                Per aggiungere una serie TV nei preferiti, bisogna prima accedere!
                                <a href="./register.php">Accedi</a>
                                </div>
                            </div>
                        </div>

                       

                    <?php }else{ ?>

                        <?php
                            require './includes/SeriePreferiteClass.php';    
                            require './includes/SeriePreferiteDAO.php'; 
                            
                            $seriePre = new SeriePreferiteDAO();

                            $checkSerie = $seriePre -> ExistSerieUtente($_SESSION['id'], $getID);
                            
                        ?>

                        <?php if($checkSerie == true){ ?>

                            <div class="col-2" style="float: right;">
                                <svg style="fill: red;" onclick="like(<?php echo $getID ?>)" id="like" class="like"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </div>


                        <?php }else{ ?>

                            <div class="col-2" style="float: right;">
                                <svg style="fill: grey;" onclick="like(<?php echo $getID ?>)" id="like" class="like"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </div>

                        <?php } ?>

                    <?php } ?> 
                    
                </div>
            </div>
        </div>
    </section>


    <!--Sezione Informazioni-->
    <section >
        <div class="container testo">
            <div class="row row-cols-auto">
                <img src="<?php echo $ris -> getimg() ?>" alt="">

                <div  id="info"></div>
                
                <div class="mt-5">
                    <h3>Trama</h3>
                    <p><?php echo $ris -> getTrama() ?></p>
                </div>
            </div>
        </div>

        <?php if($risCateg != null){?>
            <div class="container mt-5 testo">
                <h3>Categorie</h3>

                <div class="row row-cols-auto">
                    
                    <?php for($i=0; $i<$risNumCateg; $i++){ ?>
                        <a class="link-categ" href="./categoria.php?id=<?php echo $risCateg[$i] -> getCategID(); ?>">
                            <p class="border border-light rounded-pill border-3 mt-3 p-2"><?php echo $risCateg[$i] -> getCategNome() ?></p>
                        </a>                
                    <?php } ?>
                
                </div>
            </div>
        <?php }?>
    </section>


    <?php 
        require './includes/EpisodiClass.php';
        require './includes/EpisodiDAO.php';

        $stagione = new EpisodiDAO();
        $DatiStagione = $stagione -> GetStagioni($getID);
         
        $numEpisodio = 1;
    ?>

    <?php if($DatiStagione != null){ ?>
        
        <?php $DatiEpisodi = $stagione -> GetEpisodi($DatiStagione[0] -> getIdStagione()) ?>
        <div id="stagioni"></div>
        <br>
        <!--Sezione Episodi-->
        <section>
            <div class="container testo mt-5">
                <div class="row row-cols-auto">

                    <div>
                        <h3>Stagioni e Episodi</h3>
                    </div>

                    <select name="scelta" class="form-select testo" aria-label="Default select example" id="selezione" onchange="loadXmlDOC()" >

                        <option value="">Scegli una Stagione</option>
                    
                        <?php for($j=0; $j<count($DatiStagione); $j++){ ?>
                            
                            <option value="<?php echo $DatiStagione[$j] -> getIdStagione(); ?>">

                                <?php echo "Stagione ".$DatiStagione[$j] -> getNumStagione(); ?>
                                
                            </option>

                        <?php }  ?>
                    </select>      
                    
                        <section id="ContenitoreEpisodi" >
                            <div id="episodi" class="row row-cols-auto">

                                
                                <?php for($m = 0; $m<count($DatiEpisodi); $m++){ ?>
                                    
                                    <div id="card<?php echo $m ?>" class="card mt-5 testo me-4" style="width: 18rem;">
                                        <img src="<?php echo $DatiEpisodi[$m] -> getImgEpisodio(); ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div>
                                                <h5 class="card-title" style="width: 10rem;"><?php echo "  ".$DatiEpisodi[$m] -> getTitoloEpisodio()  ?></h5>
                                                <h6 class="card-text durata"><?php echo $DatiEpisodi[$m] -> getDurataEpisodio() ?></h6>
                                            </div>
                                            <p class="card-text"><?php echo $DatiEpisodi[$m] -> getDescriozioneEpisodio()  ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </section>
                        
                </div>
            </div>
        </section>  
    
    <?php } ?>

            

    <!--Sezione Footer-->
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