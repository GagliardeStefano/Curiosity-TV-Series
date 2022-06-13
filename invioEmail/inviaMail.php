<?php

    session_start();

    if($_SESSION != null){

        $id = session_id();

        $to      = $_SESSION['mail'];
        $subject = 'Cambio Password';
        $message = 'Per cambiare password cliccare il seguente link: https://curiositytvseries.altervista.org/invioEmail/cambioPassword.php?idS='.$id  ;
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        

    }else{
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

    <body class="bg-dark">
        
        <div class="container">
            <div class="row row-cols-auto">


                <div class=" m-auto" style="margin-top: 16rem;">            
                    <div class="alert alert-success" style="margin-top: 16rem;" role="alert">
                        <h4 class="alert-heading">Ben fatto!</h4>
                        <p>Per poter cambiare la password recati nell'email mandata all'indirizzo: <?php echo $_SESSION['mail'] ?></p>
                        <hr>
                        <p>Controllare nella casella: SPAM</p>
                    </div>

                    <div>
                        <a class="btn btn-primary" href="../login.php" role="button">Vai al Login</a>
                    </div>
                </div>
            
            </div>
        </div>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html>