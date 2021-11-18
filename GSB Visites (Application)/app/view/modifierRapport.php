<?php 
  use App\controller\RapportController;
?>

<html>
    <div class='p-5'>

<body>
    <!-- Titre -->
    <center><h3>MODIFICATION D'UN RAPPORT DE VISITE</h3></center>
    <hr class="mb-5">

<!-- Carte de modification du rapport -->
        <div class="card shadow-lg position-absolute top-50 start-50 translate-middle" style="width: 50rem; padding:10px; margin-top:30px;">
            <div class="card-body">
                <form action='#' method='POST' class="row g-3">
                <!-- Récupération des données rapport selectionné -->
                    <?php $rapport = RapportController::recupererRapportParID($_GET['id']); ?>

                <!-- Écrire le motif du rapport -->
                <div class='input-group'>
                    <label class='input-group-text' for='input'><i class="bi bi-journal-text"></i></label>
                    <select name='motif_RapportModif' class='form-select' id='motif' required>
                        <option selected disabled>Choisissez le motif...</option>
                        <?php foreach(RapportController::recupererLesMotifs() as $key => $val) { ?>
                            <?php if($val == $rapport->getMotif()) { ?>
                                <option selected value=<?= $val; ?>><?= $val; ?></option>
                            <?php } else { ?>
                                <option value=<?= $val; ?>><?= $val; ?></option>
                            <?php } ?>
                        <?php  } ?>
                    </select>
                </div>

                <!-- Récupération de l'ancien bilan + permission de modification -->
                    <div required>
                        <textarea name='bilan_RapportModif' class="form-control" style="margin-top:5px;" id="exampleFormControlTextarea1" rows="2" placeholder="Bilan du rapport..." required><?= $rapport->getBilan(); ?></textarea>
                    </div>

                <!-- Bouton pour envoyer les valeurs -->
                    <div class="col-12">
                        <button class="btn btn-outline-info float-end" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>