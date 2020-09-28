<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    echo json_encode(
        array('Inititate Database' => 'http://localhost/api/post/init.php',
        'Read Data from Database' => 'http://localhost/api/post/read.php',
        'Insert Data into the Database' => 'http://localhost/api/post/insert.php',
        'parameters for Insert' => 'idNumber, name, surname, contactPrimary, emailAddress, gender, language, organisation',
        'Optional Parameters' => 'contactSecondary, dead',
        'For help' => 'http://localhost/api/post/help.php')
    );
?>