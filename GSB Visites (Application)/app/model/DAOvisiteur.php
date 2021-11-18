<?php
    namespace App\model; // J'ajoute le DAOvisiteur au groupe des modèles.
    use PDO; // J'utilise la librarie permettant d'avoir des fonctions SQL (PDO)
    use App\controller\ConnexionController; // J'ajoute ConnexionController car c'est avec lui que je vais travailler les connexions


    class DAOvisiteur extends connexionBDD {
        public static function getAll() {
            $request = self::query('SELECT * FROM Visiteur;');
            $table = array();

            foreach($request as $rows) {
                $table[$rows['id']] = new Visiteur($rows['id'], $rows['nom'], $rows['prenom'], $rows['login'], $rows['mdp'], $rows['adresse'], $rows['cp'], $rows['ville'], $rows['dateEmbauche']);
            }

            return $table;
        }

        // Récupération de l'identifiant et du mot de passe
        public static function recupLoginEtMdp($login, $mdp) {
            $request = self::prepare('SELECT * FROM Visiteur WHERE login = :login AND mdp = :mdp', array(':login' => $login, ':mdp' => $mdp));

            if(!empty($request)) {
                return new Visiteur($request[0]['id'], $request[0]['nom'], $request[0]['prenom'], $request[0]['login'], $request[0]['mdp'], $request[0]['adresse'], $request[0]['cp'], $request[0]['ville'], $request[0]['dateEmbauche']);
            }
        }

        // Identification
        public static function isConnected() {
            if(!isset($_SESSION)) { session_start(); }
            
            $connected = false;

            if(isset($_SESSION['visiteurLogin'])) {
                $visiteur = self::recupLoginEtMdp($_SESSION['visiteurLogin'], $_SESSION['visiteurMdp']);

                $login = $_SESSION['visiteurLogin'];
                $mdp = $_SESSION['visiteurMdp'];
                $dbLogin = $visiteur->getLogin();
                $dbMdp = $visiteur->getMdp();

                if( (trim($dbLogin) == trim($login)) && (trim($dbMdp) == trim($mdp)) ) {
                    $connected = true;
                }
            }

            return $connected;
        }

        // Récupération du nombre de visiteurs (pour afficage 'Entreprise')
        public static function getNombreVisiteurs() {
            $request = self::query("SELECT COUNT(id) as ID FROM Visiteur;"); // "as ID" pour éviter d'écrire à chaque fois count(id) = ex: $rows["ID"];
            $total = 0;

            foreach($request as $rows) {
                $total = $rows["ID"];
            }

            return $total;
        }
    }
?>