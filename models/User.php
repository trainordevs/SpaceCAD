<?php
    class User extends Model {
        protected static $tableName = TABLE_USERS;
        protected static $primaryKey = 'id';

        function getId() {
            return $this->getColumnValue('id');
        }
        
        function setUsername($value) {
            $this->setColumnValue('username', $value);
        }

        function getUsername() {
            return $this->getColumnValue('username');
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