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
            parent::__construct('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';', DB_USER, DB_PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->cache = array();
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