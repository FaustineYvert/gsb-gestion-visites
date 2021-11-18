<?php
    namespace App\model; // J'ajoute le DAOvisiteur au groupe des modèles.
    use PDO; // J'utilise la librarie permettant d'avoir des fonctions SQL (PDO)
    use App\controller\MedicamentController; // J'ajoute Controller car c'est avec lui que je vais travailler les connexions


    class DAOmedicament extends connexionBDD {

        // Retourne une liste avec tous les médicaments
        public static function getAll() {
            $request = self::query('SELECT * FROM Medicament ORDER BY nomCommercial ASC;');
            $table = array();

            foreach($request as $rows) {
                $table[$rows['id']] = new Medicament($rows['id'], $rows['nomCommercial'], $rows['idFamille'], $rows['composition'], $rows['effets'], $rows['contreIndications']);
            }

            return $table;
        }

        // Rechercher un ou plusieurs médicaments grâce son nom 
        public static function getByNomMedicaments($search) {
            $request = self::query("SELECT * FROM Medicament WHERE nomCommercial LIKE '" . $search . "%';");
            $table = array();

            foreach($request as $rows) { 
                $table[$rows['id']] = new Medicament($rows['id'], $rows['nomCommercial'], $rows['idFamille'], $rows['composition'], $rows['effets'], $rows['contreIndications']);
            }

            return $table;
        }

        // Récupération du nombre de médicaments (pour afficage 'Entreprise')
        public static function getNombreMedicaments() {
            $request = self::query("SELECT COUNT(id) as ID FROM Medicament;"); // "as ID" pour éviter d'écrire à chaque fois count(id) = ex: $rows["ID"];
            $total = 0;

            foreach($request as $rows) {
                $total = $rows["ID"];
            }

            return $total;
        }
    }