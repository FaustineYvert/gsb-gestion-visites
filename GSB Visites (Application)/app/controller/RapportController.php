<?php
    namespace App\controller;
    use App\model\Rapport;
    use App\model\DAOrapport;
    use App\model\DAOmedicament;
    use App\model\DAOoffrir;


    class RapportController {
        private static $_instance = null;
        public static $activePage = 'rapports';

        private function __construct() {
            self::verifierRapport();
        }

        // Ajout et modification d'un rapport
        private static function verifierRapport() {

            if(isset($_POST['bilan_RapportCreate'])) {
                $date = $_POST['date_RapportCreate'];
                $motif = $_POST['motif_RapportCreate'];
                $bilan = $_POST['bilan_RapportCreate'];
                $idVisiteur = $_SESSION['visiteurID'];
                $idMedecin = $_POST['medecin_RapportCreate'];
                $medicament = $_POST['medicament_RapportCreate'];
                $quantite = $_POST['quantite_RapportCreate'];

                DAOrapport::creerUnRapport($date, $motif, $bilan, $idVisiteur, $idMedecin);
                DAOoffrir::creerOffrir(DAOrapport::getDernierRapport(), $medicament, $quantite);

                header('Location: ./?action=rapports');
            }
            

            if(isset($_POST['bilan_RapportModif'])) {
                $id = $_GET['id'];
                $motif = $_POST['motif_RapportModif'];
                $bilan = $_POST['bilan_RapportModif'];

                DAOrapport::modifierUnRapport($id, $motif, $bilan);

                header('Location: ./?action=rapports');
            }


            if(isset($_POST['date_RapportSearch'])) {
                $date = $_POST['date_RapportSearch'];

                header('Location: ./?action=rapports&date=' . $date);
            }
        }

        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new RapportController();
            }

            return self::$_instance;
        }

        // Récupération de tous les rapports
        public static function recupererTousLesRapports() {
            $rapports = DAOrapport::getAll();

            return $rapports;
        }

        // Rcupération des rapports de l'utilisateur connecté, trié par date décroissante
        public static function recupererLesRapportsParIdVisiteur($id) {
            $rapports = DAOrapport::getRapportsFromIdVisiteur($id);

            return $rapports;
        }

        // Retourne une liste avec tous les médicaments
        public static function recupererTousLesMedicaments() {
            $medicament = DAOmedicament::getAll();
            
            return $medicament;
        }

        // Retourne une liste avec tous les motifs
        public static function recupererLesMotifs() {
            $motifs = DAOrapport::getMotifs(); 
            
            return $motifs;
        }

        // Récupération du nombre de rapports (pour afficage 'Entreprise')
        public static function recupererNombreRapports() {
            $rapports = DAOrapport::getNombreRapports();
            
            return $rapports;
        }

        // Recupération du nombre de rapport par l'Id de l'utilisateur
        public static function recupererNombreDeRapportsParIdVisiteur($id) {
            $rapports = DAOrapport::getNombreRapportsById($id);

            return $rapports;
        }

        // Récupération d'un rapport par son Id
        public static function recupererRapportParID($id) {
            $rapport = DAOrapport::getRapportById($id);

            return $rapport;
        }

        // Récupération d'un rapport par sa date
        public static function recupererRapportsParDateEtId($date, $id) {
            $rapport = DAOrapport::getRapportsByDateAndId($date, $id);

            return $rapport;
        }
        
        public static function recupererLesRapportsParIdMedecin($id) {
            $rapports = DAOrapport::getRapportByIdMedecin($id);

            return $rapports;
        }

        public static function render() {
            include_once 'app/view/header.php';
            include_once 'app/view/rapports.php';
        }
        
        public static function render_creerRapport() {
            include_once 'app/view/header.php';
            include_once 'app/view/creerRapport.php';
        }

        public static function render_modifierRapport() {
            include_once 'app/view/header.php';
            include_once 'app/view/modifierRapport.php';
        }
    }  

   
?>