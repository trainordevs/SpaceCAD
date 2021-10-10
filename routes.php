<?php
    Route::set('civilian/create', function() {
        Home::createCivilian();
    });

    Route::set('vehicle/create', function() {
        Home::createVehicle();
    });

    Route::set('firearm/create', function() {
        Home::createFirearm();
    });

    Route::set('search', function() {
        Search::init();
    });

    Route::set('search/firearms', function() {
        Search::searchFirearms();
    });

    Route::set('search/civilians', function() {
        Search::searchCivilians();
    });

    Route::set('search/vehicles', function() {
        Search::searchVehicles();
    });

    Route::set('account/login', function() {
        Account::login();
    });