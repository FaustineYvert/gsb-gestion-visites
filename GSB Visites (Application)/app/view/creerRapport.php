<?php 
  use App\controller\RapportController;
  use App\controller\MedecinController;
  use App\controller\MedicamentController;
?>

<html>
<div class='p-5'>

<body>
    <!-- Titre -->
  <center><h3>AJOUT D'UN RAPPORT DE VISITE</h3></center>
  <hr class="mb-5">

<!-- Carte pour l'ajout d'un rapport -->
    <div class="card shadow-lg position-absolute top-50 start-50 translate-middle" style="width: 50rem; padding:10px; margin-top:30px;">
    <div class="card-body">
        <form action='#' method='POST' class="row g-3">

        <!-- Ajout d'un calendrier pour rentrer une date -->
            <div class="col-md-4">
                <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-calendar-week"></i></span>
                <input name='date_RapportCreate' type="date" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

        <!-- Écrire le motif du rapport -->
        <div class='input-group'>
            <label class='input-group-text' for='input'><i class="bi bi-journal-text"></i></label>
            <select name='motif_RapportCreate' class='form-select' id='motif' required>
                <option selected disabled>Choisissez le motif...</option>
                <?php foreach(RapportController::recupererLesMotifs() as $key => $val) { ?>
                    <option value=<?= $val; ?>><?= $val; ?></option>
                <?php  } ?>
            </select>
        </div>

        <!-- Écrire le bilan du rapport -->
            <div required>
                <textarea name='bilan_RapportCreate' class="form-control" style="margin-top:5px;" id="exampleFormControlTextarea1" placeholder="Bilan du rapport..." rows="2" required></textarea>
            </div>
    
        <!-- Liste des médecins -->
            <div class="col-md-3" style="width:20rem; margin-top:20px;">
                    <select name='medecin_RapportCreate' class="form-select" id="validationDefault04" required>
                    <option selected disabled value="">Choisissez le médecin...</option>
                    <?php foreach(MedecinController::recupererTousLesMedecins() as $key => $val) { ?>
                        <option value='<?= $val->getId(); ?>'><?= $val->getNom() . ' ' . $val->getPrenom(); ?></option>
                    <?php  } ?>
                    </select>
            </div>
        
        <!-- Liste des médicaments -->
            <div class="card" style="width: 40rem;  margin-left:8px; margin-top:20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3" style="width:20rem; ">
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-pills text-danger"></i></span>
                                <select name='medicament_RapportCreate' class="form-select" id="validationDefault04" required>
                                <option selected disabled value="">Choisissez un médicament...</option>
                                
                                <?php foreach(RapportController::recupererTousLesMedicaments() as $key => $val) { ?>
                                    <option value='<?= $val->getId(); ?>'><?= $val->getNomCommercial(); ?></option>
                                <?php  } ?>
                                </select>
                            </div>
                        </div>

        <!-- Quantité désirée de médicaments -->
            <div class="col-md-3" style="width:15rem; margin-bottom:20px;">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-hand-holding-medical text-success"></i></span>
                    <input name='quantite_RapportCreate' type='text' onkeypress="return onlyNumberKey(event)" class='form-control' placeholder='Quantité désirée...' required>
                    <script>
                        // Entrer seulement des numéros et non des lettres
                        function onlyNumberKey(evt) { 
                            // Only ASCII charactar in that range allowed 
                            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
                            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                                return false; 
                            }
                            return true; 
                        }          
                    </script>
                
                </div>
            </div>
        </div>
        </div>
    </div>

        <!-- Bouton "envoyer" -->
            <div class="col-12">
                <button class="btn btn-outline-info float-end" type="submit">Envoyer</button>
            </div>
        </form>
    </div>
    </div>

    </body>
</html>