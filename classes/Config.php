<?php
    // Database connection information.
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'zap-hostingesxpack_622951');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    // Search types.
    define('ENABLED_FIREARMS', false);
    define('ENABLED_CIVILIANS', true);
    define('ENABLED_VEHICLES', true);

    // Table names within database.
    define('TABLE_CIVILIANS', 'users');
    define('TABLE_VEHICLES', 'owned_vehicles');
    define('TABLE_FIREARMS', 'firearms');
    define('TABLE_USERS', 'police_members');
    define('TABLE_BOLOS', 'spacecad_bolos');

    // List all slogans that you'd like to show up at the top of the MDT.
    define('SLOGANS', [
        "Homicide: Our day starts when yours ends.",
        "Our Colors Never Run.",
        "One Family. One Fight.",
        "P.I.G.: Pride, Integrity, Guts.",
        "Live with Honor, Serve with Pride.",
        "To Protect and Serve.",
        "Proud to Serve.",
        "Justice for All."
    ]);