<?php
    session_start();

    // Should autoload, but seems to autoload when it feels like. To ensure it loads, we will just define it.
    require_once 'classes/Config.php';

    // PHP Autoloads any classes, controllers, or models that we have.
    spl_autoload_register(function ($classname) {
        if(file_exists('./classes/' . $classname . '.php')) {
            include './classes/' . $classname . '.php';
        } else if(file_exists('./controllers/' . $classname . '.php')) {
            include './controllers/' . $classname . '.php';
        } else if(file_exists('./models/' . $classname . '.php')) {
            include './models/' . $classname . '.php';
        }
    });

    // Set our routes.
    require_once 'routes.php';