<?php
    class Home extends Controller {
        public static function init() {
            //Middleware::auth('/about');
            self::CreateView('home');
        }
    }