<html>
    <head>
        <title>Login</title>

        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="">

        <?php
            
            echo "prima di tutto";
            if(isset($_POST['email'], $_POST['password'])){

                
                echo "dopo controllo";

                require "./includes/UtenteDAO.php";
                require "./includes/Utente.php";
                    
                $utente = new UtenteDAO;
    
                $mail = $_POST['email'];
                $paswd = $_POST['password'];

                if($mail != null && $paswd != null){
                    
                    $existEmail = $utente -> existMail($mail);

                    if($existEmail == true){

                        $exist = $utente -> exist($mail, $paswd);
                        if($exist == true){
                            header("location: index.php");
                        }else{
                            $flagDatiUtente = 1;
                        }

                    }else{
                        $flagNotExistEmail = 1;
                    }
                }else{
                    $flagDati = 1;
                }        
            }
        ?>

        <div class="d-grid mt-5 text-center">
            <a href="index.php">
                <button class="btn btn-primary" type="button">Torna alla Home</button>
            </a>
        </div>

        <form action="login.php" method="post">
            <div class="container mt-5"> 
                <img src="./img/logo.png" class="logo" alt=""> 
                <h1 class="testo">Login</h1>  
                <div class="row row-cols-2">

                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="E-mail">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <input class="btn btn-primary" type="submit" value="Sign In">
                    </div>

                    <div class="col-6 text-end ">
                        <a class="btn btn-primary" href="register.html" role="button">Vai alla Registrazione</a>
                    </div>

                </div>
            </div>
        </form>

        <?php if(isset($flagDati)){ ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Inserisci tutti i dati'
                    })
                </script>
        <?php   } ?>

        
        <?php if(isset($flagNotExistEmail)){ ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email non registrata',
                        footer: '<a href="register.php">Non hai un account?</a>'
                    })
                </script>
        <?php   } ?>

        
        <?php if(isset($flagDatiUtente)){ ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email e Password errati',
                        footer: '<a href="update.php">Hai dimenticato la tua Password?</a>'
                    })
                </script>
        <?php   } ?>
            





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html>