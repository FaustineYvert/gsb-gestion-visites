<?php
    namespace App\model; // J'ajoute le DAOvisiteur au groupe des modèles.
    use PDO; // J'utilise la librarie permettant d'avoir des fonctions SQL (PDO)
    use App\controller\MedecinController; // J'ajoute Controller car c'est avec lui que je vais travailler les connexions


    class DAOmedecin extends connexionBDD {

        // Retourne une liste avec tous les médecins (1000 médecins)
        public static function getAll() {
            $request = self::query('SELECT * FROM Medecin ORDER BY nom ASC;');
            $table = array();

            foreach($request as $rows) {
                $table[$rows['id']] = new Medecin($rows['id'], $rows['nom'], $rows['prenom'], $rows['adresse'], $rows['tel'], $rows['specialitecomplementaire'], $rows['departement']);
            }

            return $table;
        }

        // Rechercher un ou plusieurs médecins grâce son nom de famille 
        public static function getByNomMedecin($search) {
            $request = self::query("SELECT * FROM Medecin WHERE nom LIKE '$search%';");
            $table = array();

            foreach($request as $rows) { 
                $table[$rows['id']] = new Medecin($rows['id'], $rows['nom'], $rows['prenom'], $rows['adresse'], $rows['tel'], $rows['specialitecomplementaire'], $rows['departement']);
            }

            return $table;
        }

        // Récupération des médecins par leur Id
        public static function getMedecinByID($id) {
            $request = self::prepare('SELECT * FROM Medecin WHERE id = :id', array(':id' => $id));

            if(!empty($request)) {
                return new Medecin($request[0]['id'], $request[0]['nom'], $request[0]['prenom'], $request[0]['adresse'], $request[0]['tel'], $request[0]['specialitecomplementaire'], $request[0]['departement']);
            } else {
                return null;
            }
        }

        // Modification des informations d'un médecin
        public static function modifierUnMedecin($id, $nom, $prenom, $adresse, $tel, $specialitecomplementaire, $departement) {
            $request = self::request('UPDATE Medecin SET nom = :nom, prenom = :prenom, adresse = :adresse, tel = :tel, specialitecomplementaire = :specialitecomplementaire, departement = :departement WHERE id = :id;', array(':id' => intval($id), ':nom' => $nom, ':prenom' => $prenom, ':adresse' => $adresse, ':tel' => $tel, ':specialitecomplementaire' => $specialitecomplementaire, ':departement' => intval($departement)));
        }

        // Récupération du nombre de médecins (pour afficage 'Entreprise')
        public static function getNombreMedecins() {
            $request = self::query("SELECT COUNT(id) as ID FROM Medecin;"); // "as ID" pour éviter d'écrire à chaque fois count(id) = ex: $rows["ID"];
            $total = 0;

            foreach($request as $rows) {
                $total = $rows["ID"];
            }

            return $total;
        }
    }
?>