<?php 
  use App\controller\MedecinController;
?>

<html>
    
  <div class='p-5'>

  <body>
  <!-- Titre -->
    <center><h3>LISTE DES MÉDECINS</h3></center>
    <hr class="mb-5">

    <!-- Option de recherche d'un médecin par son nom de famille -->
      <form action='#' method='POST' class='d-flex mb-5 float-end' style='width: 22rem;'> 
         <input name='search_medecin' type='text' class='form-control' placeholder='Rechercher un médecin...' required aria-label='Rechercher'>
         <div class='px-2'></div>
         <button type='submit' class='btn btn-info' name='submit'><i class="bi bi-search"></i></button> 

    <!-- Option rafraichir la page -->
         <a class="btn btn-outline-primary" style="position: absolute; left: 0; margin-left: 3rem;" href="?action=medecins" role="button"><strong><i class="bi bi-arrow-clockwise" style="margin-right:5px;"></i>Rafraîchir</strong></a>
      </form>
  
  <!-- Cartes pour afficher toutes les informations des médecins "recherché dans la bar de recherche" -->
    <div class="row">
      <?php if(isset($_GET['search'])) { ?>
        <?php $medecins = MedecinController::recupererNomMedecins($_GET['search']) ?>
        <?php foreach($medecins as $key => $val) { ?>
          <div class="col-sm-6 mb-4">
            <div class="card">
            <!-- Nom et prénom du médecin -->
            <h5 class="card-header"> <strong><?= $val->getNom() . ' ' . $val->getPrenom(); ?></strong><a class="btn-sm btn-outline-primary float-end px-3" href="./?action=rapports&idMedecin=<?= $val->getId(); ?>" style="text-decoration:none;" role="button">Voir les rapports</a></h5>
              <div class="card-body">
              <!-- Id du médecin -->
                <h6 style='font-weight: normal;'>Id : <strong><?= $val->getId(); ?></strong></h6>
              <!-- spécialité complémentaire du médecin -->
                <h6 style='font-weight: normal;'>Spécialité complémentaire : <strong><?= $val->getSpecialite(); ?></strong></h6>
              <!-- Adresse du médecin -->
                <h6 style='font-weight: normal;'>Adresse : <strong><?= $val->getAdresse(); ?></strong></h6>
              <!-- Numéro de téléphone du médecin -->
                <h6 style='font-weight: normal;'>Numéro de téléphone : <a href='tel:<?= $val->getTel(); ?>'><strong><?= chunk_split($val->getTel(), 2, ' ');  ?></strong></a></h6>
              <!-- Département du médecin -->
              <h6 style='font-weight: normal'>Département : <strong><?= $val->getDepartement(); ?></strong></h6>
              </div>
              <div class="card-footer text-muted text-end">
              <!-- Modifier les informations du médecin -->
              <a class="btn-sm btn-outline-warning px-3" style="text-decoration:none;" href="./?action=modifierMedecin&id=<?= $val->getId(); ?>" role="button"> Modifier les informations</a>
              </div>
            </div>
          </div> 
        <?php } ?>

  <!-- Cartes pour afficher toutes les informations des médecins "sans avoir recherché dans la bar de recherche" -->
      <? } else { ?>
        <?php foreach(MedecinController::recupererTousLesMedecins() as $key => $val) { ?>
          <div class="col-sm-6 mb-4">
            <div class="card">
            <!-- Nom et prénom du médecin -->
              <h5 class="card-header"> <strong><?= $val->getNom() . ' ' . $val->getPrenom(); ?></strong><a class="btn-sm btn-outline-primary float-end px-3" href="./?action=rapports&idMedecin=<?= $val->getId(); ?>" style="text-decoration:none;" role="button">Voir les rapports</a></h5>
              <div class="card-body">
              <!-- Id du médecin -->
                <h6 style='font-weight: normal;'>Id : <strong><?= $val->getId(); ?></strong></h6>
              <!-- spécialité complémentaire du médecin -->
                <h6 style='font-weight: normal;'>Spécialité complémentaire : <strong><?= $val->getSpecialite(); ?></strong></h6>
              <!-- Adresse du médecin -->
                <h6 style='font-weight: normal;'>Adresse : <strong><?= $val->getAdresse(); ?></strong></h6>
              <!-- Numéro de téléphone du médecin -->
                <h6 style='font-weight: normal;'>Numéro de téléphone : <a href='tel:<?= $val->getTel(); ?>'><strong><?= chunk_split($val->getTel(), 2, ' ');  ?></strong></a></h6>
                <!-- Département du médecin -->
                <h6 style='font-weight: normal'>Département : <strong><?= $val->getDepartement(); ?></strong></h6>
              </div>
              <div class="card-footer text-muted text-end">
              <!-- Modifier les informations du médecin -->
              <a class="btn-sm btn-outline-warning px-3" style="text-decoration:none;" href="./?action=modifierMedecin&id=<?= $val->getId(); ?>" role="button"> Modifier les informations</a>
                
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </body>
</html>