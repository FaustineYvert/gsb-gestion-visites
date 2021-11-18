<?php
  use App\controller\MedecinController;
  use App\controller\VisiteurController;
  use App\controller\MedicamentController;
  use App\controller\RapportController;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="./?"><img src="resources/assets/images/gsb-logo.png" class="img-fluid" style="width: 80px; height: 40px; margin-right: 30px; margin-left: 15px;"  alt=""/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" style="margin-right:20px;" aria-current="page" href="./?"><strong>Accueil</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="margin-right:20px;" href="./?action=rapports">Les rapports de visite</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="margin-right:20px;" href="./?action=medecins">Les médecins</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./?action=medicaments">Les médicaments</a>
              </li>
              <li class="nav-item dropdown position-absolute top-50 end-0 translate-middle-y px-4" style="margin-right:15px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-tie mx-2"></i>Connecté en tant que <strong class="text-primary"><?= $_SESSION['visiteurNom'] . ' ' . $_SESSION['visiteurPrenom'] ?></strong>
                </a>
                <ul class="dropdown-menu position-absolute top-50 end-0 translate-middle-y mx-4" style="margin-top: 73px;" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="./?action=informations">Voir mes informations personnelles</a></li>
                  <div class="dropdown-divider"></div>
                  <li><a class="dropdown-item text-danger" href='./?action=deconnexion'>Se déconnecter</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

  <!-- Background image -->
    <style type="text/css">
            body {
                background: url('resources/assets/images/fond-info-2.png') no-repeat center center fixed;
                background-size: cover;
            }
    </style>
  <!-- Background image -->

  <div class='p-5'>

<body>

    <!-- Titre -->
  <center><h3>GALAXY SWISS BOURDIN</h3></center>
  <hr class="mb-5">

<!-- Carte d'information sur GSB -->
  <div class="row">
    <div class="card mb-3 shadow border-light" style="width: 700px; margin-left:20px; margin-top:3.5rem;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="resources/assets/images/info-fonctionnement.png" style="margin-top:7rem; margin-left:1rem;" class="img-fluid rounded-start mx-2" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body" style="padding-left:2rem;">
            <h4 class="card-title mt-2">L'entreprise</h4>
            <p class="card-text">Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion entre le géant américain Galaxy (spécialisé dans le secteur des maladies virales dont le SIDA et les hépatites) et le conglomérat européen Swiss Bourdin (travaillant sur des médicaments plus conventionnels), lui même déjà union de trois petits laboratoires . En 2009, les deux géants pharmaceutiques ont uni leurs forces pour créer un leader de ce secteur industriel. L'entité Galaxy Swiss Bourdin Europe a établi son siège administratif à Paris. Le siège social de la multinationale est situé à Philadelphie, Pennsylvanie, aux Etats-Unis.</p>
            <p class="card-text text-end fst-italic fw-light m-1"><small class="text-muted">&copy; 2021-2022 Galaxy Swiss Bourdin</small></p>
          </div>
        </div>
      </div>
    </div>

  <!-- Carte pour le nombre de médecins -->
    <div class="row row-cols-1 row-cols-md-2 g-5 position-absolute top-0 end-0" style="width:40rem; margin-top:17.5rem; margin-right: 1rem;">
      <div class="col">
        <div class="card border-light shadow">
          <div class="card-body">
            <center><h1 class="card-title text-primary"><?= MedecinController::recupererNombreMedecins(); ?></h1></center>
            <center><p class="card-text"><strong>MÉDECINS ACTIFS</strong></p></center>
          </div>
        </div>
      </div>

  <!-- Carte pour le nombre de visiteurs -->
      <div class="col">
        <div class="card border-light shadow">
          <div class="card-body">
          <center><h1 class="card-title text-primary"><?= VisiteurController::recupererNombreVisiteurs(); ?></h1></center>
            <center><p class="card-text"><strong>VISITEURS</strong></p></center>
          </div>
        </div>
      </div>

  <!-- Carte pour le nombre de médicaments -->
      <div class="col">
        <div class="card border-light shadow">
          <div class="card-body">
          <center><h1 class="card-title text-primary"><?= MedicamentController::recupererNombreMedicaments(); ?></h1></center>
            <center><p class="card-text"><strong>MÉDICAMENTS PROPOSÉS</strong></p></center>
          </div>
        </div>
      </div>

  <!-- Carte pour le nombre de rapports créés -->
      <div class="col">
        <div class="card border-light shadow">
          <div class="card-body">
          <center><h1 class="card-title text-primary"><?= RapportController::recupererNombreRapports(); ?></h1></center>
            <center><p class="card-text"><strong>RAPPORTS CRÉÉS</strong></p></center>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>