<?php
    class Home extends Controller {
        public static function init() {
            // Will add middleware after more pages are created. For now, I don't want to worry about it.
            // Middleware::auth('');
            self::CreateView('home');
        }

        public static function createCivilian() {
            $fields = array('fullName', 'gender', 'datepicker', 'license');
            foreach ($fields as $field) {
                if(!isset($_POST[$field]) || is_null($_POST[$field]) || empty($_POST[$field])) {
                    FlashMessage::setError("Create Civilian: Please fill out the entire form.", '/');
                    die();
                }
            }

            try {
                $civilian = new Civilian();
                $civilian->create([
                    'fullname' => htmlentities($_POST['fullName'], ENT_QUOTES, 'UTF-8'),
                    'gender' => htmlentities($_POST['gender'], ENT_QUOTES, 'UTF-8'),
                    'dob' => htmlentities($_POST['datepicker'], ENT_QUOTES, 'UTF-8'),
                    'license' => htmlentities($_POST['license'], ENT_QUOTES, 'UTF-8'),
                ]);
                FlashMessage::setSuccess("Create Civilian: Civilian saved.", '/');
            } catch (Exception $e) {
                FlashMessage::setError("Create Civilian: There was an error creating the civilian.", '/');
            }
        }

        public static function createVehicle() {
            $fields = array('plateNo', 'make', 'model', 'registration', 'insurance', 'owner');
            foreach ($fields as $field) {
                if(!isset($_POST[$field]) || is_null($_POST[$field]) || empty($_POST[$field])) {
                    FlashMessage::setError("Create Vehicle: Please fill out the entire form.", '/');
                    die();
                }
            }

            try {
                $vehicle = new Vehicle();
                $vehicle->create([
                    'plate' => htmlentities($_POST['plateNo'], ENT_QUOTES, 'UTF-8'),
                    'make' => htmlentities($_POST['make'], ENT_QUOTES, 'UTF-8'),
                    'model' => htmlentities($_POST['model'], ENT_QUOTES, 'UTF-8'),
                    'registration' => htmlentities($_POST['registration'], ENT_QUOTES, 'UTF-8'),
                    'insurance' => htmlentities($_POST['insurance'], ENT_QUOTES, 'UTF-8'),
                    'owner' => htmlentities($_POST['owner'], ENT_QUOTES, 'UTF-8'),
                ]);
                FlashMessage::setSuccess("Create Vehicle: Vehicle saved.", '/');
            } catch (Exception $e) {
                FlashMessage::setError("Create Vehicle: There was an error creating the vehicle.", '/');
            }
        }

        public static function createFirearm() {
            $fields = array('serial', 'type', 'registration', 'owner');
            foreach ($fields as $field) {
                if(!isset($_POST[$field]) || is_null($_POST[$field]) || empty($_POST[$field])) {
                    FlashMessage::setError("Create Firearm: Please fill out the entire form.", '/');
                    die();
                }
            }

            try {
                $firearm = new Firearm();
                $firearm->create([
                    'serial' => htmlentities($_POST['serial'], ENT_QUOTES, 'UTF-8'),
                    'type' => htmlentities($_POST['type'], ENT_QUOTES, 'UTF-8'),
                    'registration' => htmlentities($_POST['registration'], ENT_QUOTES, 'UTF-8'),
                    'owner' => htmlentities($_POST['owner'], ENT_QUOTES, 'UTF-8'),
                ]);
                FlashMessage::setSuccess("Create Firearm: Firearm saved.", '/');
            } catch (Exception $e) {
                FlashMessage::setError("Create Firearm: There was an error creating the firearm.", '/');
            }
        }

        public static function search() {
            $firearms = Firearm::getLike(['serial' => $_POST['search']]);
            $civilians = Civilian::getLike(['fullname' => $_POST['search']]);
            $vehicles = Vehicle::getLike(['plate' => $_POST['search']]);
            
            $result = "<hr>";

            if(!empty($firearms)) {
                $result .= "<p class='text-center'><strong>Firearms</strong></p>";
                foreach ($firearms as $firearm) {
                    $result .= "<p><a href='#'>View</a> - " . $firearm['serial'] . "</p>";
                }
                $result .= "<hr>";
            }

            if(!empty($civilians)) {
                $result .= "<p class='text-center'><strong>Civilians</strong></p>";
                foreach ($civilians as $civilian) {
                    $result .= "<p><a href='#'>View</a> - " . $civilian['fullname'] . " (DOB: " . $civilian['dob'] . ")</p>";
                }
                $result .= "<hr>";
            }

            if(!empty($vehicles)) {
                $result .= "<p class='text-center'><strong>Vehicles</strong></p>";
                foreach ($vehicles as $vehicle) {
                    $result .= "<p><a href='#'>View</a> - " . $vehicle['plate'] . " (" . $vehicle['make'] . " " . $vehicle['model'] . ")</p>";
                }
                $result .= "<hr>";
            }

            echo rtrim($result, '<hr>');
        }
    }