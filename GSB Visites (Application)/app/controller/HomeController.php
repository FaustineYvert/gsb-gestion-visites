<?php
    namespace App\controller;

    class HomeController {
        private static $_instance = null;
        public static $activePage = 'home';

        public static function getInstance() { 
            if(is_null(self::$_instance)) {
                self::$_instance = new HomeController();
            }

            return self::$_instance;
        } 
        
        public function render(string $page) {
            include_once 'app/view/header.php';
            include_once 'app/view/' . $page . '.php';
        }  
    } 
?>