<?php
    namespace App\controller;
    use App\model\Visiteur;
    use App\model\DAOvisiteur;

    class ConnexionController {
        private static $_instance = null;
        public static $connectfail = false;

        private function __construct() {
            self::checkConnect();
        }

        private static function checkConnect() {
            if(isset($_POST['visiteur_login']) && isset($_POST['visiteur_mdp'])) {
                $login = $_POST['visiteur_login'];
                $mdp = $_POST['visiteur_mdp'];

                self::connect($login, $mdp);
            }
        }

        private static function connect($login, $mdp) {
            if(!isset($_SESSION)) { session_start(); }
            
            $visiteur = DAOvisiteur::recupLoginEtMdp($login, $mdp);

            // Récupération de l'identifiant et du mot de passe
            if(!empty($visiteur)) {
                $dbLogin = $visiteur->getLogin();
                $dbMdp = $visiteur->getMdp();

                if( (trim($dbLogin) == trim($login)) && (trim($dbMdp) == trim($mdp)) ) {
                    $visiteurID = $visiteur->getId();
                    $visiteurNom = $visiteur->getNom();
                    $visiteurPrenom = $visiteur->getPrenom();
                    $visiteurAdresse = $visiteur->getAdresse();
                    $visiteurCp = $visiteur->getCp();
                    $visiteurVille = $visiteur->getVille();
                    $visiteurDateEmbauche = $visiteur->getDateEmbauche();

                    $_SESSION['visiteurID'] = $visiteurID;
                    $_SESSION['visiteurNom'] = $visiteurNom;
                    $_SESSION['visiteurPrenom'] = $visiteurPrenom;
                    $_SESSION['visiteurAdresse'] = $visiteurAdresse;
                    $_SESSION['visiteurCp'] = $visiteurCp;
                    $_SESSION['visiteurVille'] = $visiteurVille;
                    $_SESSION['visiteurDateEmbauche'] = $visiteurDateEmbauche;
                    $_SESSION['visiteurLogin'] = $dbLogin;
                    $_SESSION['visiteurMdp'] = $dbMdp;
                    
                    header('Location: .'); // Renvoyer vers la page d'accueil
                }
            } else {
                header('Location: ./?action=connexion&error=true');
            }
        }

        // Fonction déconnexion
        public static function disconnect() {
            if(!isset($_SESSION)) { session_start(); }
            
            if(DAOvisiteur::isConnected()) {
                session_destroy(); // Supprime toutes les variables de session

                header('Location: .'); 
            }
        }
        
        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new ConnexionController();
            }

            return self::$_instance;
        }

        public function render() {
            include_once 'app/view/header.php';
            include_once 'app/view/connexion.php';
        }  
    } 
?>