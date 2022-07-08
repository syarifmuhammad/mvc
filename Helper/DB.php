<?php 

    class DB {
        private static $host = "localhost";
        private static $username = "root";
        private static $password = "";
        private static $db = "mvc";
        private static $connection = null;

        private function __constructor(){

        }

        private static function getConnection(){
            if(!self::$connection){
                self::$connection = mysqli_connect(self::$host, self::$username, self::$password, self::$db);
            }
        }

        public static function closeConnection(){
            if(self::$connection){
                mysqli_close(self::$connection);
            }
        }

        public static function exec($query){
            self::getConnection();
            return mysqli_query(self::$connection, $query);
        }

    }

?>