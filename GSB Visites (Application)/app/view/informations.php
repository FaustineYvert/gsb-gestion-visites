<?php 
  if(!isset($_SESSION)) { session_start(); }
  use App\controller\VisiteurController;
?>

<html>

<div class='p-5'>

<body>
  <!-- Titre -->
    <center><h3>VOS INFORMATIONS</h3></center>
    <hr>

  <!-- Cartes d'informations -->
    <div id='informations_Card' class="bg-white shadow-lg border rounded-3 p-5 position-absolute top-50 start-50 translate-middle" style="width: 50rem;">

    <!-- Nom et prénom -->
      <h3 style='font-weight: normal;'>Bonjour <strong><?= $_SESSION['visiteurPrenom'] . ' ' . $_SESSION['visiteurNom']; ?></strong></h3>
      <h5 class='text-muted' style='font-weight: normal;'>Voici un récapitulatif de vos <strong>informations personnelles</strong></h5>
      <hr/>
    <!-- Id du visiteur -->
      <h6 style='font-weight: normal;'>Votre identifiant : <strong><?= $_SESSION['visiteurID']; ?></strong></h6>
    <!-- Nom de login -->
      <h6 style='font-weight: normal;'>Votre nom d'utilisateur : <strong><?= $_SESSION['visiteurLogin']; ?></strong></h6>
    <!-- Adresse, code postal et ville du visiteur -->
      <h6 style='font-weight: normal;'>Votre adresse : <strong><?= $_SESSION['visiteurAdresse'] . ', ' . $_SESSION['visiteurCp'] . ' ' . $_SESSION['visiteurVille']; ?></strong></h6>
    <!-- Date d'embauche du visiteur -->
      <h6 style='font-weight: normal;'>Votre date d'embauche : <strong><?= $_SESSION['visiteurDateEmbauche']; ?></strong></h6>
    </div>   





</body>
</html>