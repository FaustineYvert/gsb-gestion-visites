<?php
    namespace App\controller;

    class EntrepriseController {
        private static $_instance = null;

        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new EntrepriseController();
            }

            return self::$_instance;
        } 
        
        public function render() {
            $this->activePage = 'entreprise';

            include_once 'app/view/entreprise.php';
        }  
    } 
?>