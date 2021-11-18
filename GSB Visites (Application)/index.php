<?php
    // Required 
    namespace App\controller;
    include 'vendor/autoload.php';

    // Vérifie si la session est lancée, sinon on la lance.
    if(!isset($_SESSION)) { session_start(); }

    // Recupere l'action pour savoir si elle existe ou non, sinon défaut
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'default';
    }

    // Switch case
    switch($action) {
        // Action : informations
        case 'informations':
            HomeController::getInstance()->render('informations');
            break;

        // Action : médecins
        case 'medecins' :
            MedecinController::getinstance()->render();
            break;

        // Action : modification d'un rapport
        case 'modifierRapport' :
            RapportController::getInstance()->render_modifierRapport();
            break;

        // Action : modification des informations du médcin
        case 'modifierMedecin' :
            MedecinController::getInstance()->render_modifierMedecin();
            break;
        
        // Action : création d'un rapport
        case 'creerRapport' :
            RapportController::getinstance()->render_creerRapport();
            break;

        // Action : rapports
        case 'rapports' :
            RapportController::getinstance()->render();
            break;

        // Action : entreprise
        case 'entreprise' :
            EntrepriseController::getinstance()->render();
            break;

        // Action : médicaments
        case 'medicaments' :
            MedicamentController::getinstance()->render();
            break;


        // Action : déconnexion
        case 'deconnexion':
            ConnexionController::getInstance()->disconnect();
            break;
        
        // Action : connexion
        case 'connexion':
            ConnexionController::getInstance()->render();
            break;

        default:
            if(VisiteurController::isConnected()) {
                HomeController::getInstance()->render('home');
            } else {
                ConnexionController::getInstance()->render();
            }
            break;
    }
?>