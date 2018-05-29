<?php
    // REST API access through HTTP.

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-with');

    include_once '../../config/Database.php';
    include_once '../../models/Categories.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instanstiate blog post object.
    $post = new Categories($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // $post->id = $data->id;
    $post->name = $data->name;
    // $post->created_at = $data->created_at;

    // Create post
    if ($post->create()) {
        echo json_encode(
            array('message' => 'Category Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Created')
        );
    }

