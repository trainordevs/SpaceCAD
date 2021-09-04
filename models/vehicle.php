<?php
    class Vehicle extends Model {
        protected static $tableName = TABLE_VEHICLES;
        protected static $primaryKey = 'id';

        function getId() {
            return $this->getColumnValue('id');
        }
        
        function setPlate($value) {
            $this->setColumnValue('plate', $value);
        }

        function getPlate() {
            return $this->getColumnValue('plate');
        }
        
        function setMake($value) {
            $this->setColumnValue('make', $value);
        }

        function getMake() {
            return $this->getColumnValue('make');
        }
        
        function setModel($value) {
            $this->setColumnValue('model', $value);
        }

        function getModel() {
            return $this->getColumnValue('model');
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