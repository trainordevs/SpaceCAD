<?php
    class Database extends PDO {
        protected static $instance;
        protected $cache;
        
        static function getInstance() {
            if(!self::$instance) {
                self::$instance = new Database();
            }
            return self::$instance;
        }
    
        function __construct() {
            try {
                parent::__construct('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';', DB_USER, DB_PASS);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->cache = array();
            } catch (PDOException $e) {
                die("There was an error with the database connection.");
            }
        }

        function connectionTest() {
            try {
                self::$instance->query("SELECT 1");
            } catch (PDOException $e) {
                exit('There was an error with the database connection.');
            }
        }
        
        function getPreparedStatement($query) {
            $hash = md5($query);
            if(!isset($this->cache[$hash])) {
                $this->cache[$hash] = $this->prepare($query);
            }
            return $this->cache[$hash];
        }
        
        function __destruct() {
            $this->cache = NULL;
        }
    }
?>