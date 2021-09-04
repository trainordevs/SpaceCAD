<?php
    Route::set('civilian/create', function() {
        Home::createCivilian();
    });

    Route::set('vehicle/create', function() {
        Home::createVehicle();
    });

    Route::set('about', function() {
        About::CreateView('about');
    });