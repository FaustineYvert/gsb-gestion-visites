<?php 
  use App\controller\MedecinController;
?>

<html>
    <div class='p-5'>

<body>
    <!-- Titre -->
    <center><h3>MODIFICATION DES INFORMATIONS DU MÉDECIN</h3></center>
    <hr class="mb-5">
    

<!-- Carte de modification du rapport -->
        <div class='container'>
            <?php if(isset($_GET['errortel'])) { ?>
                <center>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style='width: 61.5%; margin-bottom: 1rem;'>
                        Le numéro de téléphone doit <strong>obligatoirement</strong> commencer par un <strong>0</strong> !
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </center>
            <?php } ?>
            
            <div class="card shadow-lg position-absolute top-50 start-50 translate-middle" style="width: 50rem; padding:10px; margin-top:50px;">
                    
                <div class="card-body">
                    <form action='#' method='POST' class="row g-3">
                    <!-- Récupération des données rapport selectionné -->
                        <?php $rapport = MedecinController::getMedecinByID($_GET['id']); ?>

                    <!-- Écrire le motif du rapport -->
                    <div class="col-md-4">
                        <input type="text" name='nom_MedecinModif' class="form-control" id="validationDefault01" value='<?= $rapport->getNom(); ?>' placeholder="Nom du médecin..." required>
                    </div>

                    <div class="col-md-4">
                    <input type="text" name='prenom_MedecinModif' class="form-control" id="validationDefault01" value='<?= $rapport->getPrenom(); ?>' placeholder="Prenom du médecin..." required>
                    </div>
                    <br>
                    <div>
                    <input type="text" name='adresse_MedecinModif' class="form-control" id="validationDefault01" value='<?= $rapport->getAdresse(); ?>' placeholder="Adresse du médecin..." required>
                    </div>
                    <br>
                    <div>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">+33</span>
                        <input name='tel_MedecinModif' type='text' onkeypress="return onlyNumberKey(event)" class='form-control' minlength='10' maxlength='10' value='<?= $rapport->getTel(); ?>' placeholder='Numéro de téléphone' required>
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
                    <br>
                    <div>
                    <input type="text" name='specialitecomplementaire_MedecinModif' class="form-control" id="validationDefault01" value='<?= $rapport->getSpecialite(); ?>' placeholder="Spécialité Complementaire du médecin...">
                    </div>
                    <br>
                    <div>
                    <input type="text" name='departement_MedecinModif' class="form-control" onkeypress="return onlyNumberKey(event)" id="validationDefault01" value='<?= $rapport->getDepartement(); ?>' maxlength='2' placeholder="Département du médecin..." required>
                    
                    </div>

                
                    <!-- Bouton pour annuler et envoyer les valeurs -->
                        <div class="col-12">
                            <a class="btn btn-outline-danger" href="./?action=medecins" role="button">Annuler</a>
                            
                            <button class="btn btn-outline-info float-end" type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>