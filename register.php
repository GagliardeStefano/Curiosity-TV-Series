<html>
    <head>
        <title>Registrazione</title>

        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="">

    <?php 

        

        if(isset($_POST['nome'], $_POST['cognome'], $_POST['mail'], $_POST['pwd'])){

        
            
            require "./includes/UtenteDAO.php";
            require "./includes/Utente.php";
                
            $utente = new UtenteDAO;

            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $mail = $_POST['mail'];
            $paswd = $_POST['pwd'];

            $arrayErrori = [""];

            if($nome != null){
                //
            }else{
                $flagNome = "Inserisci un nome -- ";
                array_push($arrayErrori, $flagNome);
            }

            if($cognome != null){
                //
            }else{
                $flagCognome = "Inserisci un cognome -- ";
                array_push($arrayErrori, $flagCognome);
            }

            if($mail != null){
                //
            }else{
                $flagMail = "Inserisci un email -- ";
                array_push($arrayErrori, $flagMail);
            }

            if($paswd != null){
                //
            }else{
                $flagPwd = "Inserisci una password -- ";
                array_push($arrayErrori, $flagPwd);
            }


            $exist = $utente -> existMail($mail);
            if($exist == true){
                $flagExist = "Email già registrata -- ";
                array_push($arrayErrori, $flagExist);
            }else{
                //
            }
        
        }

    ?>


    <div class="d-grid mt-5 text-center">
        <a href="index.php">
            <button class="btn btn-primary" type="button">Torna alla Home</button>
        </a>
    </div>

        <form action="register.php" method="post">
            <div class="container mt-5"> 
                <img src="./img/logo.png" class="logo" alt=""> 
                <h1 class="testo">Registrazione</h1>  
                <div class="row row-cols-2">

                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome" id="floatingInput" placeholder="Nome">
                            <label for="floatingInput">Nome</label>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cognome" id="floatingInput" placeholder="Cognome">
                            <label for="floatingInput">Cognome</label>
                        </div> 
                    </div>

                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="mail" id="floatingInput" placeholder="E-mail">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="pwd" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <input class="btn btn-primary" type="submit" value="Sign In">
                    </div>

                    <div class="col-6 text-end ">
                        <a class="btn btn-primary" href="login.php" role="button">Vai al Login</a>
                    </div>

                </div>

                 
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text:'<?php for($i=0; $i < count($arrayErrori); $i++) echo $arrayErrori[$i]?>' 
                    })
                </script>
                
                  


            </div>
        </form>

       


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        

    </body>
</html>