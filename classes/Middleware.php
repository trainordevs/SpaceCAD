<?php
    class Middleware {
        public static function auth($redirect) {
            if(!isset($_SESSION['id'])) {
                //die("You aren't logged in.");
                FlashMessage::setError("You are not logged in");
                header("Location: $redirect");
            }
        }
    }