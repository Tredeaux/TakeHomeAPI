<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    // Instantiate DB & COnnect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Post
    $post = new Post($db);

    //Query
    $result = $post->read();
    $num = $result->rowCount();
    if ($num > 0) {
        $posts_arr = array();
        $posts_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $post_item = array(
                'id' => $id,
                'idNumber' => $idNumber,
                'name' => $name,
                'surname' => $surname,
                'contactPrimary' => $contactPrimary,
                'contactSecondary' => $contactSecondary,
                'emailAddress' => $emailAddress,
                'gender' => $gender,
                'language' => $language,
                'dead' => $dead,
                'organisation' => $organisation,
                'creationDate' => $creationDate
            );

            //Push to data
            array_push($posts_arr['data'], $post_item);
        }

        //Convert to JSON
        echo json_encode($posts_arr);
    } else {
        //No data
        echo json_encode(
            array('message' => 'No Records Found')
        );
    }
?>