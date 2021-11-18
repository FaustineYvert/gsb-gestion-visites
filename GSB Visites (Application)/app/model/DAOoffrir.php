<?php
    namespace App\model; // J'ajoute le DAOvisiteur au groupe des modèles.
    use PDO; // J'utilise la librarie permettant d'avoir des fonctions SQL (PDO)
    use App\controller\MedecinController; // J'ajoute Controller car c'est avec lui que je vais travailler les connexions


    class DAOoffrir extends connexionBDD {

        // Retourne une liste avec tous les médecins (1000 médecins)
        public static function getAll() {
            $request = self::query('SELECT * FROM Medecin ORDER BY nom ASC;');
            $table = array();

            foreach($request as $rows) {
                $table[$rows['id']] = new Medecin($rows['id'], $rows['nom'], $rows['prenom'], $rows['adresse'], $rows['tel'], $rows['specialitecomplementaire'], $rows['departement']);
            }

            return $table;
        }

        // Offrir des médicaments
        public static function creerOffrir($idRapport, $medicament, $quantite) {
            $request = self::request('INSERT INTO Offrir VALUES (:idRapport, :medicament, :quantite);', array(':idRapport' => $idRapport, ':medicament' => $medicament, ':quantite' => $quantite));
        }
    }
?>