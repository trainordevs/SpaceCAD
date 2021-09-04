<?php
    class Firearm extends Model {
        protected static $tableName = TABLE_FIREARMS;
        protected static $primaryKey = 'id';

        function getId() {
            return $this->getColumnValue('id');
        }
        
        function setSerial($value) {
            $this->setColumnValue('serial', $value);
        }

        function getSerial() {
            return $this->getColumnValue('serial');
        }
        
        function setType($value) {
            $this->setColumnValue('type', $value);
        }

        function getType() {
            return $this->getColumnValue('type');
        }
        
        function setRegistration($value) {
            $this->setColumnValue('registration', $value);
        }

        function getRegistration() {
            return $this->getColumnValue('registration');
        }
        
        function setOwner($value) {
            $this->setColumnValue('owner', $value);
        }
        
        function getOwner() {
            return $this->getColumnValue('owner');
        }
    }