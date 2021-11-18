<?php
    namespace App\model; // J'ajoute le DAOvisiteur au groupe des modèles.
    use PDO; // J'utilise la librarie permettant d'avoir des fonctions SQL (PDO)
    use App\controller\RapportController; // J'ajoute Controller car c'est avec lui que je vais travailler les connexions


    class DAOrapport extends connexionBDD {

        // Récupération de tous les rapports
        public static function getAll() {
            $request = self::query('SELECT * FROM Rapport;');
            $table = array();

            foreach($request as $rows) {
                $table[$rows['id']] = new Rapport($rows['id'], $rows['date'], $rows['motif'], $rows['bilan'], $rows['idVisiteur'], $rows['idMedecin']);
            }

            return $table;
        }

        // Affichage des rapport de l'utilisateur connecté, trié par date décroissante
        public static function getRapportsFromIdVisiteur($id) {
            $request = self::prepare("SELECT * FROM Rapport WHERE idVisiteur = :id ORDER BY date DESC;", array(':id' => $id));
            $table = array();
            
            if(!empty($request)) {
                foreach($request as $rows) {
                    $table[$rows['id']] = new Rapport($rows['id'], $rows['date'], $rows['motif'], $rows['bilan'], $rows['idVisiteur'], $rows['idMedecin']);
                }
            }

            return $table;
        }

        // Récupération des rapports par rapport à l'id du médecin
        public static function getRapportByIdMedecin($id) {
            $request = self::prepare('SELECT * FROM Rapport WHERE idMedecin = :id ORDER BY date DESC;', array(':id' => $id));
            $table = array();

            if(!empty($request)) {
                foreach($request as $rows) {
                    $table[$rows['id']] = new Rapport($rows['id'], $rows['date'], $rows['motif'], $rows['bilan'], $rows['idVisiteur'], $rows['idMedecin']);
                }
            }

            return $table;
        }

        // Récupération d'un rapport par son Id
        public static function getRapportById($id) {
            $request = self::prepare('SELECT * FROM Rapport WHERE id = :id;', array(':id' => $id));

            if(!empty($request)) {
                return new Rapport($request[0]['id'], $request[0]['date'], $request[0]['motif'], $request[0]['bilan'], $request[0]['idVisiteur'], $request[0]['idMedecin']);
            } 
        }

        // Récupération du dernier rapport ajouté
        public static function getDernierRapport() {
            $query = self::query('SELECT MAX(id) AS ID FROM Rapport;');
            $dernierRapport = 0; // On le connaît pas, on le met à 0 par défaut.

            foreach($query as $rows) {
                $dernierRapport = $rows['ID']; // Il a cherché dans la BDD, il l'a retrouvé, le $dernierRapport est donc établi. (Par ex: 1600 si le dernier ID d'un rapport est le 1600)
            }

            return $dernierRapport; // On retourne l'ID du dernier rapport afin de pouvoir l'utiliser dans RapportController.php
        }

        // Recupération du nombre de rapport par l'Id de l'utilisateur
        public static function getNombreRapportsById($id) {
            $request = self::prepare("SELECT COUNT(id) as ID FROM Rapport WHERE idVisiteur = :id;", array(':id' => $id));
            $total = 0;

            foreach($request as $rows) {
                $total = $rows["ID"];
            }

            return $total;
        }

        // Recherche d'un rapport avec une date précise
        public static function getRapportsByDateAndId($date, $id) {
            $request = self::prepare('SELECT * FROM Rapport WHERE date = :date AND idVisiteur = :id_visitor ORDER BY date DESC;', array(':date' => $date, ':id_visitor' => $id));
            $collection = array();

            if(!empty($request)) {
                foreach($request as $rows) {
                    $collection[$rows['id']] = new Rapport($rows['id'], $rows['date'], $rows['motif'], $rows['bilan'], $rows['idVisiteur'], $rows['idMedecin']);
                }
            }

            return $collection;
        }

        // Retourne une liste avec tous les médicaments
        public static function getMotifs() {
            $request = self::query("SELECT DISTINCT motif FROM Rapport LIMIT 6;");
            $tableau = array(); // Tableau pour mettre des valeurs à l'intérieur

            if(!empty($request)) {
                foreach($request as $rows) {
                    $tableau[] = $rows['motif'];
                }
            }

            return $tableau;
        }

        // Ajout d'un rapport
        public static function creerUnRapport($date, $motif, $bilan, $idVisiteur, $idMedecin) {
            $request = self::request('INSERT INTO Rapport(date, motif, bilan, idVisiteur, idMedecin) VALUES (:date, :motif, :bilan, :idVisiteur, :idMedecin);', array(':date' => $date, ':motif' => $motif, ':bilan' => $bilan, ':idVisiteur' => $idVisiteur, ':idMedecin' => $idMedecin));
        }

        // Modification d'un rapport
        public static function modifierUnRapport($id, $motif, $bilan) {
            $requestion = self::request('UPDATE Rapport SET motif = :motif, bilan = :bilan WHERE id = :id', array(':id' => $id, ':motif' => $motif, ':bilan' => $bilan));
        }

        // Récupération du nombre de rapports (pour afficage 'Entreprise')
        public static function getNombreRapports() {
            $request = self::query("SELECT COUNT(id) as ID FROM Rapport;"); // "as ID" pour éviter d'écrire à chaque fois count(id) = ex: $rows["ID"];
            $total = 0;

            foreach($request as $rows) {
                $total = $rows["ID"];
            }

            return $total;
        }

    }