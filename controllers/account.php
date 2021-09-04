<?php
    class Account extends Controller {
        public static function login() {
            // Will add middleware after more pages are created. For now, I don't want to worry about it.
            // Middleware::auth('');
            self::CreateView('account/login');
        }
    }