<?php 
  use App\controller\RapportController;
  use App\controller\MedecinController;
?>

<html>

<div class='p-5'>
<body>
  <!-- Titre -->
    <center><h3>LES RAPPORTS</h3></center>
    <hr class="mb-5">
    
<!-- Phrase de bienvenue avec le nombre de rapports que possède l'utilisateur -->
  <p class="fst-italic fw-light text-dark mx-4 text-end">Bonjour <strong><?= $_SESSION['visiteurNom'] . ' ' . $_SESSION['visiteurPrenom'] ?></strong> vous avez <strong><?= RapportController::recupererNombreDeRapportsParIdVisiteur($_SESSION['visiteurID']); ?></strong> rapports.</p>

  <br>
  <?php if(!isset($_GET['idMedecin'])) { ?>
  <a class="btn btn-outline-primary" style="position: absolute; left: 0; margin-left: 3rem;" href="?action=rapports" role="button"><strong><i class="bi bi-arrow-clockwise" style="margin-right:5px;"></i></strong></a>

  <!-- Recherche d'un rapport par date (modal) -->
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-primary" style="margin-left:3.5rem;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Rechercher un rapport par date
  </button>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Recherche par date</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method='POST'>
          <div class="modal-body">
            <!-- Ajout d'un calendrier pour rentrer une date -->
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2"><i class="far fa-calendar-alt"></i></span>
                <!-- Type date -->
                <input name='date_RapportSearch' type="date" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Rechercher</button>
          </div>
        </form>
      </div>
    </div>
  </div> 
  <?php } else { ?>

  <!-- Button revenir -->
  <a class="btn btn-outline-primary" style="margin-right:1rem;" href="./?action=rapports" role="button">Revenir à la page des rapports</a>
  <a class="btn btn-outline-primary" href="./?action=medecins" role="button">Revenir à la page des médecins</a>
  <?php } ?>

    <!-- Tableau des Rapports -->
    <table class="table table-sm table-bordered table-hover table-light" style="margin-top:2rem;">
        <thead>
          <tr>
          <!-- Colonne Id du rapport -->
            <th scope="col" class="text-center" style="padding-top:10px; padding-bottom:10px;">Id</th>
          <!-- Colonne date de création du rapport -->
            <th scope="col" class="text-center" style="padding-bottom:10px;">Date de création</th>
          <!-- Colonne motif du rapport -->
            <th scope="col" class="text-center" style="padding-bottom:10px;">Motif</th>
          <!-- Colonne bilan du rapport -->
            <th scope="col" class="text-center" style="width:24rem; padding-bottom:10px;">Bilan</th>
          <!-- Colonne médecin du rapport -->
            <th scope="col" class="text-center" style="width:10rem; padding-bottom:10px;">Médecin</th>
            <th scope='col' class='text-center' style='width:10rem; padding-bottom:10px;'>
               <!-- Ajouter un rapport -->
              <?php if(!isset($_GET['idMedecin'])) { ?>
                <a href="./?action=creerRapport" class="btn btn-success" style="width:13rem;" role="button"><i class="fas fa-plus"> Ajouter un Rapport</i></a>
              <?php } ?>
            </th>
          </tr>
        </thead>

        <!-- Je récupère le paramètre 'DATE' qui est dans l'URL. (Ex: www.google.com/profil&date=2002-01-13) -->
        <?php if(isset($_GET['date'])) { ?>
          <?php $rapports = RapportController::recupererRapportsParDateEtId($_GET['date'], $_SESSION['visiteurID']); ?>
            <?php if(empty($rapports)) { ?>
              <div class="alert alert-danger d-flex align-items-center" style="margin-top:20px;" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                <i class="bi bi-exclamation-triangle-fill" style="margin-right:0.5rem;"></i><strong>Erreur !</strong> Aucun rapport(s) à cette date.
                </div>
              </div>
            <?php } else { ?>
              <?php foreach($rapports as $key => $val)  { ?>
                <?php $medecin = MedecinController::getMedecinByID($val->getMedecin()); ?>
                <tbody>
                  <tr>
                  <!-- Id du rapport -->
                    <th scope="row"> <?= $val->getId(); ?> </th>
                  <!-- Date du rapport -->
                    <td> <?= $val->getDate();?> </td>
                  <!-- Motif du rapport -->
                    <td> <?= $val->getMotif();?> </td>
                  <!-- Bilan du rapport -->
                    <td> <?= $val->getBilan();?> </td>
                  <!-- Nom et prénom du médecin du rapport -->
                    <td> <?= $medecin->getNom() . ' ' . $medecin->getPrenom(); ?> </td>
                  <!-- Bouton modifier le rapport -->
                    <td> <a class="btn btn-outline-secondary btn-sm px-5" style="margin-left:2rem;" href="./?action=modifierRapport&id=<?= $val->getId(); ?>" role="button"> <i class="far fa-edit"> Modifier </i></a> </td>
                  </tr>
                </tbody>
              <?php } ?>
            <?php } ?>
          <?php } elseif(isset($_GET['idMedecin'])) { ?>
            <?php foreach(RapportController::recupererLesRapportsParIdMedecin($_GET['idMedecin']) as $key => $val) { ?>
              <?php $medecin = MedecinController::getMedecinByID($val->getMedecin()); ?>
              <tbody>
                <tr>
                <!-- Id du rapport -->
                  <th scope="row"> <?= $val->getId(); ?> </th>
                <!-- Date du rapport -->
                  <td> <?= $val->getDate();?> </td>
                <!-- Motif du rapport -->
                  <td> <?= $val->getMotif();?> </td>
                <!-- Bilan du rapport -->
                  <td> <?= $val->getBilan();?> </td>
                <!-- Nom et prénom du médecin du rapport -->
                  <td> <?= $medecin->getNom() . ' ' . $medecin->getPrenom(); ?> </td>
                <!-- Bouton modifier le rapport -->
                  <?php if($val->getVisiteur() == $_SESSION['visiteurID']) { ?>
                    <td> <a class="btn btn-outline-secondary btn-sm px-5" style="margin-left:2rem;" href="./?action=modifierRapport&id=<?= $val->getId(); ?>" role="button"> <i class="far fa-edit"> Modifier </i></a> </td>
                  <?php } ?>
                </tr>
              </tbody>
            <?php } ?>
          <?php } else { ?>
            <?php foreach(RapportController::recupererLesRapportsParIdVisiteur($_SESSION['visiteurID']) as $key => $val)  { ?>
              <?php $medecin = MedecinController::getMedecinByID($val->getMedecin()); ?>
              <tbody>
                <tr>
                <!-- Id du rapport -->
                  <th scope="row"> <?= $val->getId(); ?> </th>
                <!-- Date du rapport -->
                  <td> <?= $val->getDate();?> </td>
                <!-- Motif du rapport -->
                  <td> <?= $val->getMotif();?> </td>
                <!-- Bilan du rapport -->
                  <td> <?= $val->getBilan();?> </td>
                <!-- Nom et prénom du médecin du rapport -->
                  <td> <?= $medecin->getNom() . ' ' . $medecin->getPrenom(); ?> </td>
                <!-- Bouton modifier le rapport -->
                  <td> <a class="btn btn-outline-secondary btn-sm px-5" style="margin-left:2rem;" href="./?action=modifierRapport&id=<?= $val->getId(); ?>" role="button"> <i class="far fa-edit"> Modifier </i></a> </td>
                </tr>
              </tbody>
            <?php } ?>
        <?php } ?>
    </table>

</body>
</html>