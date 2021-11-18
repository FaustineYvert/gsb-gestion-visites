<?php
    namespace App\controller;
    use App\model\Medicament;
    use App\model\DAOmedicament;

    class MedicamentController {
        private static $_instance = null;
        public static $activePage = 'medicaments';

        private function __construct() {
            self::checkMedicamentRecherche();
        }

        // Recherche de médicaments
        private static function checkMedicamentRecherche() {
            if(isset($_POST['search_medicaments'])) {
                $search = $_POST['search_medicaments'];

                header('Location: ./?action=medicaments&search=' . $search);
            }
        }


        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new MedicamentController();
            }

            return self::$_instance;
        }

        // Retourne une liste avec tous les médicaments
        public static function recupererTousLesMedicaments() {
            $medicaments = DAOmedicament::getAll();
            
            return $medicaments;
        }

        // Rechercher un ou plusieurs médicaments grâce son nom 
        public static function recupererNomMedicaments($search) {
            $medicaments = DAOmedicament::getByNomMedicaments($search);

            return $medicaments;
        }

        // Récupération du nombre de médicaments (pour afficage 'Entreprise')
        public static function recupererNombreMedicaments() {
            $medicaments = DAOmedicament::getNombreMedicaments();

            return $medicaments;
        }

        public function render() {
            include_once 'app/view/header.php';
            include_once 'app/view/medicaments.php';
        }
    }
?>