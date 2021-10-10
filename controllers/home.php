<?php
    class Home extends Controller {
        public static function init() {
            // Will add middleware after more pages are created. For now, I don't want to worry about it.
            // Middleware::auth('');
            self::CreateView('home');
        }

        public static function createBOLO() {
            $fields = array('type', 'lkl', 'wantedDesc');
            foreach ($fields as $field) {
                if(!isset($_POST[$field]) || is_null($_POST[$field]) || empty($_POST[$field])) {
                    FlashMessage::setError("Create BOLO: Please fill out the entire form.", '/');
                    die();
                }
            }

            try {
                $bolo = new BOLO();
                $bolo->create([
                    'type' => htmlentities($_POST['type'], ENT_QUOTES, 'UTF-8'),
                    'lkl' => htmlentities($_POST['lkl'], ENT_QUOTES, 'UTF-8'),
                    'description' => htmlentities($_POST['wantedDesc'], ENT_QUOTES, 'UTF-8'),
                    'active' => 'True'
                ]);
                FlashMessage::setSuccess("Create BOLO: BOLO saved.", '/');
            } catch (Exception $e) {
                FlashMessage::setError("Create BOLO: There was an error creating the BOLO.", '/');
            }
        }

        public static function clearBolo() {
            $bolo = BOLO::getOne(['id' => $_POST['id']]);
            $bolo->setActive('False');
            $bolo->save();
            FlashMessage::setSuccess("Clear BOLO: BOLO cleared.", '/');
        }

        public static function random_slogan() {
            return SLOGANS[rand(0, (count(SLOGANS) - 1))];
        }
    }