<?php
    // REST API access through HTTP.

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Categories.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instanstiate blog post object.
    $post = new Categories($db);

    // Get Id
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get post by id
    $post->read_single();

    // Create array
    $post_arr = array(
        'id' => $post->id,
        'name' => $post->name,
        'created_at' => $post->created_at
    );

    // Convert to json
    print_r(json_encode($post_arr));
