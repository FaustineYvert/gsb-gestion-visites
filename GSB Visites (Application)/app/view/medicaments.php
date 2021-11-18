<?php 
  use App\controller\MedicamentController;
  use App\model\DAOmedicament;
?>

<html>
    
  <div class='p-5'>

  <body>
  <!-- Titre -->
    <center><h3>LISTE DES MÉDICAMENTS</h3></center>
    <hr class="mb-5">

    <!-- Option de recherche d'un médiacment par son nom -->
        <form action='#' method='POST' class='d-flex mb-5 float-end' style='width: 22rem;'> 
            <input name='search_medicaments' type='text' class='form-control' placeholder='Rechercher un médicament...' aria-label='Rechercher'>
            <div class='px-2'></div>
            <button type='submit' class='btn btn-info' name='submit'><i class="bi bi-search"></i></button> 

    <!-- Option rafraichir la page -->
            <a class="btn btn-outline-primary" style="position: absolute; left: 0; margin-left: 3rem;" href="?action=medicaments" role="button"><strong><i class="bi bi-arrow-clockwise" style="margin-right:5px;"></i>Rafraîchir</strong></a>
        </form>

    <!-- Cartes pour afficher toutes les informations des médecins "recherché dans la bar de recherche" -->
        <div class="row">
        <?php if(isset($_GET['search'])) { ?>
        <?php $medicaments = MedicamentController::recupererNomMedicaments($_GET['search']) ?>
        <?php foreach($medicaments as $key => $val) { ?>
            <div class="col-sm-6 mb-4">
                    <div class="card">
                    <!-- Nom du médicament -->
                        <h5 class="card-header"> <strong><?= $val->getNomCommercial() ; ?></strong></h5>
                        <div class="card-body">
                        <!-- Id du médicament -->
                            <h6 style='font-weight: normal;'>Id : <strong><?= $val->getId(); ?></strong></h6>
                        <!-- Composition du médicament -->
                            <h6 style='font-weight: normal;'>Composition : <strong><?= $val->getComposition(); ?></strong></h6>
                        <!-- Effet du médicament -->
                            <h6 style='font-weight: normal;'>Effet : <strong><?= $val->getEffet(); ?></strong></h6>
                        <!-- Contre indication du médicament -->
                            <h6 style='font-weight: normal;'>Contre indication : <strong><?= $val->getContreIndication(); ?></strong></h6>
                        </div>
                        <div class="card-footer text-muted text-end">
                        <!-- Famille du médicament -->
                            <h6 class="fst-italic fw-light" >Famille : <?= $val->getIdFamille(); ?></h6>
                        </div>
                    </div>
                </div>
        <?php } ?>

    <!-- Cartes pour afficher toutes les informations des médecins "sans avoir recherché dans la bar de recherche" -->
        <? } else { ?>
            <?php foreach(MedicamentController::recupererTousLesMedicaments() as $key => $val) { ?>
                <div class="col-sm-6 mb-4">
                    <div class="card">
                    <!-- Nom du médicament -->
                        <h5 class="card-header"> <strong><?= $val->getNomCommercial() ; ?></strong></h5>
                        <div class="card-body">
                        <!-- Id du médicament -->
                            <h6 style='font-weight: normal;'>Id : <strong><?= $val->getId(); ?></strong></h6>
                        <!-- Composition du médicament -->
                            <h6 style='font-weight: normal;'>Composition : <strong><?= $val->getComposition(); ?></strong></h6>
                        <!-- Effet du médicament -->
                            <h6 style='font-weight: normal;'>Effet : <strong><?= $val->getEffet(); ?></strong></h6>
                        <!-- Contre indication du médicament -->
                            <h6 style='font-weight: normal;'>Contre indication : <strong><?= $val->getContreIndication(); ?></strong></h6>
                        </div>
                        <div class="card-footer text-muted text-end">
                        <!-- Famille du médicament -->
                            <h6 class="fst-italic fw-light" >Famille : <?= $val->getIdFamille(); ?></h6>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
  </body>
</html>