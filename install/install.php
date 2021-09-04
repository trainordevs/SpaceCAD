<?php
    require_once "../classes/Config.php";

    $db = new PDO('mysql:host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ERRMODE_EXCEPTION,TRUE);

    try {
        $db->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
        $db->__construct('mysql:host=' . DB_HOST.';dbname=' . DB_NAME.';charset=utf8', DB_USER, DB_PASS);
    } catch(PDOException $e) {
        die($e->getMessage());
    }

    try {
        // Create civilans table by default.
        $db->exec("CREATE TABLE " . TABLE_CIVILIANS . "(
            id BIGINT AUTO_INCREMENT NOT NULL,
            fullname VARCHAR(100) NOT NULL,
            gender ENUM('male', 'female') NOT NULL,
            dob VARCHAR(10) NOT NULL,
            license ENUM('valid', 'suspended', 'revoked', 'none') NOT NULL,
            PRIMARY KEY (id)
        );");

        // Create vehicles table by default.
        $db->exec("CREATE TABLE " . TABLE_VEHICLES . "(
            id BIGINT AUTO_INCREMENT NOT NULL,
            plate VARCHAR(100) NOT NULL,
            make VARCHAR(100) NOT NULL,
            model VARCHAR(100) NOT NULL,
            registration ENUM('valid', 'invalid') NOT NULL,
            insurance ENUM('valid', 'invalid') NOT NULL,
            owner BIGINT NOT NULL,
            PRIMARY KEY (id)
        );");

        // Create firearms table by default.
        $db->exec("CREATE TABLE " . TABLE_FIREARMS . "(
            id BIGINT AUTO_INCREMENT NOT NULL,
            serial VARCHAR(100) NOT NULL,
            type ENUM('melee', 'handgun', 'shotgun', 'smg', 'lmg', 'ar', 'sr', 'hw', 'tw', 'sw') NOT NULL,
            registration ENUM('valid', 'invalid') NOT NULL,
            owner BIGINT NOT NULL,
            PRIMARY KEY (id)
        );");

        // Create users table by default.
        $db->exec("CREATE TABLE " . TABLE_USERS . "(
            id BIGINT AUTO_INCREMENT NOT NULL,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(100) NOT NULL,
            rank VARCHAR(30) NOT NULL,
            fullname VARCHAR(100) NOT NULL,
            privilege INT(2) NOT NULL,
            PRIMARY KEY (id)
        );");

        // Create bolos table by default.
        $db->exec("CREATE TABLE " . TABLE_BOLOS . "(
            id BIGINT AUTO_INCREMENT NOT NULL,
            type ENUM('person', 'vehicle', 'other') NOT NULL,
            lkl VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            active ENUM('true', 'false') NOT NULL,
            PRIMARY KEY (id)
        );");

        $default_username = 'admin';
        $default_password = md5($default_username . 's4lt$t61N9');
        $default_rank = 'Administrator';
        $default_fullname = 'Administrator';

        $statement = $db->prepare("INSERT INTO ".TABLE_USERS."(username, password, rank, fullname, privilege) VALUES (:u, :p, :r, :f, 1)");
        $statement->bindValue(':u', $default_username, PDO::PARAM_STR);
        $statement->bindValue(':p', $default_password, PDO::PARAM_STR);
        $statement->bindValue(':r', $default_rank, PDO::PARAM_STR);
        $statement->bindValue(':f', $default_fullname, PDO::PARAM_STR);
        $statement->execute();
    } catch(PDOException $e) {
        die($e->getMessage());
    }

    echo "Installation complete. Please delete the 'install' folder from your root directory.";
?>