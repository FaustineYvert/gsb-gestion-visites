<?php
    namespace App\controller;
    use App\model\Medecin;
    use App\model\DAOmedecin;

    class MedecinController {
        private static $_instance = null;
        public static $activePage = 'medecins';

        private function __construct() {
            self::checkMedecin();
        }

        // Recherde de médecins
        private static function checkMedecin() {
            if(isset($_POST['search_medecin'])) {
                $search = $_POST['search_medecin'];

                header('Location: ./?action=medecins&search=' . $search);
            }

            if(isset($_POST['nom_MedecinModif'])) {
                $id = $_GET['id'];
                $nom = $_POST['nom_MedecinModif'];
                $prenom = $_POST['prenom_MedecinModif'];
                $adresse = $_POST['adresse_MedecinModif'];
                $tel = $_POST['tel_MedecinModif'];
                $specialitecomplementaire = $_POST['specialitecomplementaire_MedecinModif'];
                $departement = $_POST['departement_MedecinModif'];

                if($tel[0] != '0') {
                    header('Location: ./?action=modifierMedecin&id=' . $id . '&errortel');
                    return;
                }

                DAOmedecin::modifierUnMedecin($id, $nom, $prenom, $adresse, $tel, $specialitecomplementaire, $departement);

                header('Location: ./?action=medecins');
            }
        }

        // Récupération des médecins par leur Id
        public static function getMedecinByID($id) {
            $medecin = DAOmedecin::getMedecinByID($id);

            return $medecin;
        }

        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new MedecinController();
            }

            return self::$_instance;
        }

        // Retourne une liste avec tous les médecins (1000 médecins)
        public static function recupererTousLesMedecins() {
            $medecins = DAOmedecin::getAll();
            
            return $medecins;
        }

        // Rechercher un ou plusieurs médecins grâce son nom de famille 
        public static function recupererNomMedecins($search) {
            $medecins = DAOmedecin::getByNomMedecin($search);

            return $medecins;
        }

        // Récupération du nombre de médecins (pour afficage 'Entreprise')
        public static function recupererNombreMedecins() {
            $medecins = DAOmedecin::getNombreMedecins();

            return $medecins;
        }

        public function render() {
            include_once 'app/view/header.php';
            include_once 'app/view/medecins.php';
        }

        public static function render_modifierMedecin() {
            include_once 'app/view/header.php';
            include_once 'app/view/modifierMedecin.php';
        }
    }
?>