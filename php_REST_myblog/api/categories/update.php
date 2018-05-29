<?php
    // REST API access through HTTP.

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    // Set ID to update
    $post->id = $data->id;

    $post->name = $data->name;

    // Update post
    if ($post->update()) {
        echo json_encode(
            array('message' => 'Post Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'Post Not Updated')
        );
    }

