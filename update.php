<html>
    <head>

            
        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <title>Aggiorna</title>
    </head>

    <body>
        
        <?php

            if(isset($_POST['email'], $_POST['checkEmail'], $_POST['newPasswd'], $_POST['checkNewPasswd'])){
                
                require "./includes/UtenteDAO.php";
                require "./includes/Utente.php";
                    
                $utente = new UtenteDAO;

                $mail = $_POST['email'];
                $checkMail = $_POST['checkEmail'];
                $newPwd = $_POST['newPasswd'];
                $checkNewPwd = $_POST['checkNewPasswd'];

                $arrayErrori = [];

                if(isset($mail)){
                    //
                }else{
                    $flagMail = "Inserisci l'email -- ";
                    array_push($arrayErrori, $flagMail);
                }

                if(isset($checkMail)){
                    //
                }else{
                    $flagCheckMail = "Inserisci l'email di conferma -- ";
                    array_push($arrayErrori, $flagCheckMail);
                }

                if(isset($newPwd)){
                    //
                }else{
                    $flagPwd = "Inserisci la nuova Password -- ";
                    array_push($arrayErrori, $flagPwd);
                }

                if(isset($checkNewPwd)){
                    //
                }else{
                    $flagCheckPwd = "Inserisci la Password di conferma -- ";
                    array_push($arrayErrori, $flagCheckPwd);
                }

                $utente -> existMail($mail);
                if($utente == true){
                    //
                }else{
                    $flagExist = "L'email inserita non è registrata -- ";
                    array_push($arrayErrori, $flagExist);
                }

                if($mail == $checkMail){
                    //
                }else{
                    $flagEqualsEmail = "L'email e l'email di conferma non combaciano -- ";
                    array_push($arrayErrori, $flagEqualsEmail);
                }

                if($newPwd == $checkNewPwd){
                    //
                }else{
                    $flagEqualsPwd = "La password e la password di conferma non combaciano -- ";
                    array_push($arrayErrori, $flagEqualsPwd);
                }
               
            }

        ?>



        <form action="update.php" method="post">

            <div class="container mt-5"> 

                <img src="./img/logo.png" class="logo" alt=""> 
                <h1 class="testo">Cambia Password</h1>  
                <div class="row row-cols-2">

                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="E-mail">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>

                    
                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="checkEmail" id="floatingInput" placeholder="E-mail">
                            <label for="floatingInput">Conferma Email</label>
                        </div>
                    </div>
                    
                    <div class="col mb-5">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="newPasswd" id="floatingInput" placeholder="E-mail">
                            <label for="floatingInput">Nuova Password</label>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="checkNewPasswd" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Conferma Nuova Password</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <input class="btn btn-primary" type="submit" value="Sign In">
                    </div>

                    <div class="col-6 text-end ">                        
                        <a class="btn btn-primary" href="login.php" role="button">Ritorna alla login</a>
                    </div>

                </div>
            </div>



        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text:'<?php for($i=0; $i < count($arrayErrori); $i++) echo $arrayErrori[$i]?>' 
            })
        </script>
        </form>



    </body>
</html>