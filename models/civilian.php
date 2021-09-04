<?php
    class Civilian extends Model {
        protected static $tableName = TABLE_CIVILIANS;
        protected static $primaryKey = 'id';

        const PRIV_ADMINISTRATOR = 1;
        const PRIV_POLICE = 2;

        function getId() {
            return $this->getColumnValue('id');
        }
        
        function setUsername($value) {
            $this->setColumnValue('username', $value);
        }

        function getUsername() {
            return $this->getColumnValue('username');
        }
        
        function setPassword($value) {
            $this->setColumnValue('password', $value);
        }

        function getPassword() {
            return $this->getColumnValue('password');
        }
        
        function setRank($value) {
            $this->setColumnValue('rank', $value);
        }

        function getRank() {
            return $this->getColumnValue('rank');
        }
        
        function setFullname($value) {
            $this->setColumnValue('fullname', $value);
        }

        function getFullname() {
            return $this->getColumnValue('fullname');
        }
        
        function setPrivilege($value) {
            $this->setColumnValue('privilege', $value);
        }
        
        function getPrivilege() {
            return $this->getColumnValue('privilege');
        }
    }