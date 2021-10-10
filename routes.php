<?php
    Route::set('bolo/create', function() {
        Home::createBOLO();
    });

    Route::set('bolo/clear', function() {
        Home::clearBOLO();
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