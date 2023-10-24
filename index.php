<?php

    require_once 'DatabaseConnection.php';

    $configDB = require_once 'configDB.php';

    $dbConnection = new DatabaseConnection($configDB);

    $dbInstance = $dbConnection::getInstance($configDB);

    var_dump($dbInstance);
    print_r("<br><br>");
    var_dump($dbInstance->getConnection());
    print_r("<br><br>");
    var_dump($dbInstance->getConnectionStatus());
    print_r("<br><br>");
//    var_dump($dbInstance->getConnectionAttributes());

    // simple test example

    $dbConnection = new DatabaseConnection($configDB);

    $dbInstance = $dbConnection::getInstance($configDB);

    var_dump($dbInstance);
    print_r("<br><br>");
    var_dump($dbInstance->getConnection());
    print_r("<br><br>");
    var_dump($dbInstance->getConnectionStatus());
    print_r("<br><br>");
//    var_dump($dbInstance->getConnectionAttributes());