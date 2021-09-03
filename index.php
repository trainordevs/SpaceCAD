<?php
    session_start();

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