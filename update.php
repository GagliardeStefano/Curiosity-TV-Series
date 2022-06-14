<html>
    <head>
        <title>Update</title>    

        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        
    </head>

    <body class="bg-dark">
        
        <?php

            if(isset($_POST['email'])){
                
                require "./includes/UtenteDAO.php";
                require "./includes/UtenteClass.php";
                    
                $utente = new UtenteDAO;

                $mail = $_POST['email'];
                
                $arrayErroriUpdate = [];

                if($mail == null){
                    $flagMail = "Inserisci l’email -- ";
                    array_push($arrayErroriUpdate, $flagMail);
                } 

               
                $exist = $utente -> existMail($mail);
                if($exist == false){
                    $flagExist = "L’email non è registrata -- ";
                    array_push($arrayErroriUpdate, $flagExist);
                }

                if($arrayErroriUpdate == null){
                    session_start();
                    $_SESSION['mail'] = $mail;
                    $_SESSION['idUtente'] = $utente -> getUtente($mail);
                    header("location: ./invioEmail/inviaMail.php");
                }
                
                
            }

        ?>

        <div class="d-grid mt-5 text-center">
            <a href="login.php">
                <button class="btn btn-primary" type="button">Torna al login</button>
            </a>
        </div>

        <form action="update.php" method="post">

            <div class="container mt-5"> 

                <img src="./img/logo.png" class="logo" alt=""> 
                <h1 class="testo">Cambia Password</h1>  
                <div class="row row-cols-auto">

                    <div class="col-6 mb-5">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="E-mail">
                            <label for="floatingInput">Inserisci Email</label>
                        </div>
                    </div>

                    
                    <div class="col-6">
                        <input class="btn btn-primary" type="submit" value="Invia">
                    </div>

                </div>
            </div>
        </form>

        <?php if(isset($arrayErroriUpdate)){   ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text:'<?php for($i=0; $i < count($arrayErroriUpdate, COUNT_NORMAL); $i++){ echo $arrayErroriUpdate[$i]; }?>' 
                })
            </script>
        
       <?php } ?>
      
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html>