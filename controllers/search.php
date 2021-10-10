<?php
    class Search extends Controller {
        public static function init() {
            // Will add middleware after more pages are created. For now, I don't want to worry about it.
            // Middleware::auth('');
            self::CreateView('search');
        }

        public static function random_slogan() {
            $slogans = [
                "Homicide: Our day starts when yours ends.",
                "Our Colors Never Run.",
                "One Family. One Fight.",
                "P.I.G.: Pride, Integrity, Guts.",
                "Live with Honor, Serve with Pride.",
                "To Protect and Serve.",
                "Proud to Serve.",
                "Justice for All."
            ];
            
            return $slogans[rand(0, (count($slogans) - 1))];
        }

        public static function searchFirearms() {
            $firearms = Firearm::getLike(['serial' => $_POST['search']]);

            $result = "<p class='text-center'><strong>Firearms</strong></p>";

            if(!empty($firearms)) {
                foreach ($firearms as $firearm) {
                    $result .= "<p><button class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm w-100'>" . $firearm['serial'] . "</button></p>";
                }
            } else {
                $result .= "<p>No firearms match that search query.</p>";
            }

            echo $result;
        }

        public static function searchCivilians() {
            $civilians = Civilian::getLike(['fullname' => $_POST['search']]);

            $result = "<p class='text-center'><strong>Civilians</strong></p>";

            if(!empty($civilians)) {
                foreach ($civilians as $civilian) {
                    $result .= "<p><button class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm w-100'>" . $civilian['fullname'] . " (DOB: " . $civilian['dob'] . ")</button></p>";
                }
            } else {
                $result .= "<p>No civilians match that search query.</p>";
            }

            echo $result;
        }

        public static function searchVehicles() {
            $vehicles = Vehicle::getLike(['plate' => $_POST['search']]);

            $result = "<p class='text-center'><strong>Vehicles</strong></p>";

            if(!empty($vehicles)) {
                foreach ($vehicles as $vehicle) {
                    $result .= "<p><button class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm w-100'>" . $vehicle['plate'] . " (" . $vehicle['make'] . " " . $vehicle['model'] . ")</button></p>";
                }
            } else {
                $result .= "<p>No vehicles match that search query.</p>";
            }

            echo $result;
        }
    }