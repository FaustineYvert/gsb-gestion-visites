<?php 
  if(!isset($_SESSION)) { session_start(); }
  use App\controller\ConnexionController;
  use App\controller\VisiteurController;
?>

<!DOCTYPE HTML>
<html class='h-100' lang='fr'>
<head>
    <!-- Base -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>GestCom</title>

    <!-- Adding Bootstrap -->
    <link href='resources/css/bootstrap.min.css' rel='stylesheet'>
    <script src='resources/js/bootstrap.bundle.min.js'></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css'>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- / Adding Bootstrap -->

<!-- Navbar -->

  <!-- Si l'utilisateur n'est pas connecté, afficher cette navbar : -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <?php if(!VisiteurController::isConnected()) { ?>
        <ul class='navbar-nav mx-auto' style="padding-top:4px; padding-bottom:2px;">
          <h4 class='text-black' style='text-shadow: 10px 5px 1px rgba(126, 209, 227, 0.4)'>Bienvenue sur Galaxy Swiss Bourdin</h4>
        </ul>

  <!-- Si l'utilisateur est connecté, afficher cette navbar : -->
      <?php } else { ?>
        <div class="container-fluid">
        <a href="./?"><img src="resources/assets/images/gsb-logo.png" class="img-fluid" style="width: 80px; height: 40px; margin-right: 30px; margin-left: 15px;"  alt=""/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

            <!-- Accueil -->
              <li class="nav-item">
                <a class="nav-link <?= self::$activePage == 'home' ? 'active' : '' ?>" style="margin-right:20px;" aria-current="page" href=".">Accueil</a>
              </li>

            <!-- Rapports de visites -->
              <li class="nav-item">
                <a class="nav-link <?= self::$activePage == 'rapports' ? 'active' : '' ?>" style="margin-right:20px;" href="./?action=rapports">Les rapports de visite</a>
              </li>

            <!-- Médecins -->
              <li class="nav-item">
                <a class="nav-link <?= self::$activePage == 'medecins' ? 'active' : '' ?>" style="margin-right:20px;" href="./?action=medecins">Les médecins</a>
              </li>

            <!-- Médicaments -->
              <li class="nav-item">
                <a class="nav-link <?= self::$activePage == 'medicaments' ? 'active' : '' ?>" href="./?action=medicaments">Les médicaments</a>
              </li>

            <!-- Phrase "connecté en tant que '...'" -->
              <li class="nav-item dropdown position-absolute top-50 end-0 translate-middle-y px-4">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-tie mx-2"></i>Connecté en tant que <strong class="text-primary"><?= $_SESSION['visiteurNom'] . ' ' . $_SESSION['visiteurPrenom'] ?></strong>
                </a>

            <!-- Dropdown : informations personnelles + déconnexion -->
                <ul class="dropdown-menu position-absolute top-50 end-0 translate-middle-y mx-4" style="margin-top: 73px;" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="./?action=informations">Voir mes informations personnelles</a></li>
                  <div class="dropdown-divider"></div>
                  <li><a class="dropdown-item text-danger" href='./?action=deconnexion'>Se déconnecter</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      <?php } ?>
    </nav>

</head>
