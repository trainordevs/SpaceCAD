<?php
    class BOLO extends Model {
        protected static $tableName = TABLE_FIREARMS;
        protected static $primaryKey = 'id';

        function getId() {
            return $this->getColumnValue('id');
        }
        
        function setLastKnownLocation($value) {
            $this->setColumnValue('lkl', $value);
        }

        function getLastKnownLocation() {
            return $this->getColumnValue('lkl');
        }
        
        function setType($value) {
            $this->setColumnValue('type', $value);
        }

        function getType() {
            return $this->getColumnValue('type');
        }
        
        function setDescription($value) {
            $this->setColumnValue('description', $value);
        }

        function getDescription() {
            return $this->getColumnValue('description');
        }
        
        function setActive($value) {
            $this->setColumnValue('active', $value);
        }
        
        function getActive() {
            return $this->getColumnValue('active');
        }
    }