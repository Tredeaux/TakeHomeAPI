<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-Width');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    // Instantiate DB & COnnect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Post
    $post = new Post($db);

    //get Raw Data
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data)) {
        http_response_code(400);
        echo json_encode(
            array('Error' => 'No Data found. Record Not Inserted')
        );
    } else {
        $validData = TRUE;

        if (isset($data->idNumber)) {
            $post->idNumber = $data->idNumber;
        } else {
            $validData = FALSE;
            echo json_encode(
                array('Error' => 'idNumber field missing')
            );
        }  

        if (isset($data->name)) {
            $post->name = $data->name;
        } else {
            $validData = FALSE;
            echo json_encode(
                array('Error' => 'NAME field missing')
            );
        }

        if (isset($data->surname)) {
            $post->surname = $data->surname;
        } else {
            $validData = FALSE;
            echo json_encode(
                array('Error' => 'surname field missing')
            );
        } 

        if (isset($data->emailAddress)) {
            $post->emailAddress = $data->emailAddress;
        } else {
            $validData = FALSE;
            echo json_encode(
                array('Error' => 'emailAddress field missing')
            );
        } 

        if (isset($data->ContactPrimary)) {
            $post->ContactPrimary = $data->ContactPrimary;
        } else {
            $validData = FALSE;
            echo json_encode(
                array('Error' => 'ContactPrimary field missing')
            );
        } 

        if (isset($data->gender)) {
            $post->gender = $data->gender;
        } else {
            $validData = FALSE;
            echo json_encode(
                array('Error' => 'gender field missing')
            );
        }

        if (isset($data->organisation)) {
            $post->organisation = $data->organisation;
        } else {        
            $validData = FALSE;   
            echo json_encode(
                array('Error' => 'organisation field missing')
            );         
        }

        if (isset($data->contactSecondary)) {
            $post->contactSecondary = $data->contactSecondary;
        }

        if (isset($data->dead)) {
            $post->dead = $data->dead;
        }

        //For direct testing
        // $post->idNumber = $data->idNumber;
        // $post->name = $data->name;
        // $post->surname = $data->surname;
        // $post->emailAddress = $data->emailAddress;
        // $post->contactPrimary = $data->contactPrimary;
        // $post->contactSecondary = $data->contactSecondary;
        // $post->gender = $data->gender;
        // $post->dead = $data->dead;
        // $post->organisation = $data->organisation;

        //Create Post
        if ($validData == TRUE) {
            if($post->insert()) {
                http_response_code(200);
                echo json_encode(
                    array('message' => 'Record Inserted')
                );
            } else {
                http_response_code(500);
                echo json_encode(
                    array('message' => 'Server error: Record Not Inserted')
                );
            }
        } else {
            http_response_code(400);
        }
    }