<?php
    class Civilian extends Model {
        protected static $tableName = TABLE_CIVILIANS;
        protected static $primaryKey = 'id';

        const PRIV_ADMINISTRATOR = 1;
        const PRIV_POLICE = 2;

        function getId() {
            return $this->getColumnValue('identifier');
        }

        function setFirstName($value) {
            $this->setColumnValue('firstname', $value);
        }

        function getFirstName() {
            return $this->getColumnValue('firstname');
        }

        function setLastName($value) {
            $this->setColumnValue('lastname', $value);
        }

        function getLastName() {
            return $this->getColumnValue('lastname');
        }
    }