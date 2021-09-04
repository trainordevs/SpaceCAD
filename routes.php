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
        Home::search();
    });

    Route::set('about', function() {
        About::CreateView('about');
    });

    Route::set('account/login', function() {
        Account::login();
    });