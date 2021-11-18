<?php
    namespace App\model;
    use PDO; 

    // Class
    class connexionBDD {
        
        // Variables
        private static $conn_DB = null;
        private static $host_DB = '127.0.0.1';
        private static $name_DB = 'gsb_gestion_visites';
        private static $user_DB = 'root';
        private static $pass_DB = '';

        // Fonctions
        protected static function getPDO() {
            if(is_null(self::$conn_DB)) {
                $connectPDO = new PDO('mysql:host=' . self::$host_DB . ';dbname=' . self::$name_DB . ';charset=utf8', self::$user_DB, self::$pass_DB);
                $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$conn_DB = $connectPDO;
            }

            return self::$conn_DB;
        }

        protected static function query($statement) {
            $stat = self::getPDO()->query($statement);

            return $stat;
        }

        protected static function prepare($statement, $attributes) {
            $stat = self::getPDO()->prepare($statement);
            $stat->execute($attributes);

            return $stat->fetchAll();
        }

        protected static function prepareFetch($statement, $attributes) {
            $stat = self::getPDO()->prepare($statement);
            $stat->execute($attributes);

            return $stat->fetch();
        }

        protected static function request($statement, $attributes) {
            $stat = self::getPDO()->prepare($statement);

            $stat->execute($attributes);
        }
    }
?>