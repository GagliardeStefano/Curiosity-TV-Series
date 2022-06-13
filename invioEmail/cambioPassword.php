<?php
    
    require '../includes/UtenteDAO.php';
    require '../includes/UtenteClass.php';
        
    $utente = new UtenteDAO;

    $getid = $_GET['idS'];

    
    session_id($getid);
    session_start();

    if($_SESSION == null){
    
        header("location: ../index.php");
    
    }
?>


<html>
    <head>
        <title>Cambio Password</title>
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
</html>
<body class="bg-dark">

    <?php
        if(isset($_POST['passwd'], $_POST['check'])){


            $passwd = $_POST['passwd'];
            $check = $_POST['check'];

            $arrayErrori = [];

            if($passwd == null){
                array_push($arrayErrori, "Inserisci la nuova Password -- ");

            }elseif(strlen($passwd) < 8){
                array_push($arrayErrori, "La nuova Password deve contenere almeno 8 caratteri -- ");
            }

            if($check == null){

                array_push($arrayErrori, "Inserisci la Password di Conferma -- ");

            }

            if($passwd != $check){
                array_push($arrayErrori, "Le due Password non combaciano -- ");
            }

            if($arrayErrori == null){
                $passwdCript = md5($passwd);
                $utente -> ChangePass($_SESSION['mail'], $passwdCript);
                header("location: ../login.php");
            }
        }
    
    ?>

    
        <form action="cambioPassword.php" method="post">

            <div class="container mt-5"> 
                <img src="../img/logo.png" class="logo" alt=""> 
                <h1 class="testo">Cambio Password</h1>  
                <div class="row row-cols-2">

                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="passwd" id="floatingInput" placeholder="Nuova Password">
                            <label for="floatingInput">Nuova Password</label>
                        </div>
                        <div id="passwordHelpBlock" class="form-text">
                            La Password deve contenere almeno 8 caratteri!
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="check" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password di Conferma</label>
                        </div>
                       
                    </div>

                    <div class="col-6">
                        <input class="btn btn-primary" type="submit" value="Sign In">
                    </div>
                </div>
            </div>
        </form>

        <?php if(isset($arrayErrori)){   ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text:'<?php for($i=0; $i < count($arrayErrori, COUNT_NORMAL); $i++){ echo $arrayErrori[$i]; }?>' 
                })
            </script>
        
       <?php } ?>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>