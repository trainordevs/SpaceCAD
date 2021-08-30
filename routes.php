<?php
    Route::set('', function() {
        Home::CreateView('home');
    });

    Route::set('about', function() {
        About::CreateView('about');
    });