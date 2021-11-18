<?php
    namespace App\controller;
    use App\model\DAOvisiteur;

    class VisiteurController {
        private static $_instance = null;

        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new VisiteurController();
            }

            return self::$_instance;
        }

        // Fonction pour récupérer le nombre de visiteurs sur GSB
        public static function recupererNombreVisiteurs() {
            $visiteurs = DAOvisiteur::getNombreVisiteurs();

            return $visiteurs;
        }

        // Fonction pour la connexion
        public static function isConnected() {
            $isConnected = DAOvisiteur::isConnected();

            return $isConnected;
        }
    } 
?>