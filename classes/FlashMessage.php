<?php
    class FlashMessage {
        public static function setInfo(string $message, $redirect = null) {
            $_SESSION['flash_status'] = 'info';
            $_SESSION['flash_message'] = $message;

            if(!is_null($redirect)) {
                header("Location: $redirect");
            }
        }

        public static function setError(string $message, $redirect = null) {
            $_SESSION['flash_status'] = 'error';
            $_SESSION['flash_message'] = $message;

            if(!is_null($redirect)) {
                header("Location: $redirect");
            }
        }

        public static function setSuccess(string $message, $redirect = null) {
            $_SESSION['flash_status'] = 'success';
            $_SESSION['flash_message'] = $message;

            if(!is_null($redirect)) {
                header("Location: $redirect");
            }
        }

        public static function clearMessage() {
            unset($_SESSION['flash_status']);
            unset($_SESSION['flash_message']);
        }
    }