<?php
    Route::set('', Home::init());

    Route::set('about', function() {
        About::CreateView('about');
    });