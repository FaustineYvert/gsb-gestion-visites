<!DOCTYPE HTML>
<html class='h-100' lang='fr'>
<head>
    <!-- Base -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>GestCom</title>


    <!-- Adding Bootstrap -->
    <link href='resources/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css'>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- / Adding Bootstrap -->

    <!-- Background image -->
    <style type="text/css">
        body {
            background: url('resources/assets/images/Background.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
    <!-- Background image -->
</head>
    <center><img src="resources/assets/images/gsb-logo-blanc.png" class="img-fluid" style="width: 160px; height: 80px; margin-top : 70px "  alt=""/></center>
   
    <!-- Bloc de Connexion -->
        <!-- Message d'eereur (utilisateur ou mot de passe incorrect) -->
    <?php if(isset($_GET['error']) && $_GET['error'] == 'true') { ?>
        <center><div class="alert alert-danger alert-dismissible fade show" style=" font-size: 13px; width: 480px; height: 50px; margin-top: 20px;" role="alert">
            <strong>Erreur !</strong> votre identifiant ou votre mot de passe est incorrect.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></center>
    <?php } ?>
    
    <!-- Carte HTML pour la connexion -->
    <body class='text-center'>
        <main class='form-signin'>
            <div class="card shadow-lg position-absolute top-50 start-50 translate-middle text-dark bg-light mb-3 my-3 col-lg-4 mx-auto" >
                <div class="card-header fw-bold "><center>Connexion à votre compte</center></div>
                <div class="card-body">
                <form action='#' method='POST'>
                    <div class='form-floating mt-2'>
                        <input type='login' name='visiteur_login' class='form-control' id='floatingInput' placeholder='Login'>
                        <label for='floatingInput' class='text-secondary fw-light'>Identifiant...</label>
                    </div>
                    <div class='p-2'></div>
                    <div class='form-floating'>
                        <input type='password' name='visiteur_mdp' class='form-control' id='floatingInput' placeholder='Mot de passe'>
                        <label for='floatingInput' class='text-secondary fw-light'>Mot de passe...</label>
                    </div>
                    <div class='p-2'></div>
                    <button class='w-100 btn btn-md btn-outline-info mb-2' type='submit'>Se connecter</button>
                </form>
            </div>
        </form>
    </body>

</html>