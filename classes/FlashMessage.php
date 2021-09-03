<?php
    class FlashMessage {
        public static function setInfo(string $message) {
            $_SESSION['flash_status'] = 'info';
            $_SESSION['flash_message'] = $message;
        }

        public static function setError(string $message) {
            $_SESSION['flash_status'] = 'error';
            $_SESSION['flash_message'] = $message;
        }

        public static function setSuccess(string $message) {
            $_SESSION['flash_status'] = 'success';
            $_SESSION['flash_message'] = $message;
        }

        public static function clearMessage() {
            unset($_SESSION['flash_status']);
            unset($_SESSION['flash_message']);
        }
    }