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
            $name = explode(" ", $_POST['search']);

            if(count($name) == 1) {
                $civilians = Civilian::getLike(['firstname' => $name[0]]);
            } else {
                $civilians = Civilian::getLike(['firstname' => $name[0], 'lastname' => $name[1]]);
            }

            $result = "<p class='text-center'><strong>Civilians</strong></p>";

            if(!empty($civilians)) {
                foreach ($civilians as $civilian) {
                    $result .= "<p><button class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm w-100'>" . $civilian['firstname'] . " " . $civilian['lastname'] . " (DOB: " . $civilian['dateofbirth'] . ")</button></p>";
                }
            } else {
                $result .= "<p>No civilians match that search query.</p>";
            }

            echo $result;
        }

        public static function searchVehicles() {
            $vehicles = Vehicle::getLike(['plate' => $_POST['search']]);
            $obj = json_decode(file_get_contents('vehicles.json'), true);

            $result = "<p class='text-center'><strong>Vehicles</strong></p>";

            if(!empty($vehicles)) {
                foreach ($vehicles as $vehicle) {
                    $owner = Civilian::getOne(['identifier' => $vehicle['owner']]);
                    $model_code = json_decode($vehicle['vehicle'], true)['model'];

                    foreach ($obj as $v) {
                        if($v['Code'] == $model_code) {
                            $result .= "<p><button class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm w-100'>" . $vehicle['plate'] . " (" . $v['Name'] . " - " . $owner->getFirstName() . " " . $owner->getLastName() .")</button></p>";
                        }
                    }
                }
            } else {
                $result .= "<p>No vehicles match that search query.</p>";
            }

            echo $result;
        }
    }