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

    // Blog post query
    $result = $post->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any posts
    if ($num > 0) {
        // Post array
        $posts_arr = array();
        $posts_arr['data'] = array();

        // Loop through array data
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = array(
                'id' => $id,
                'name' => $name,
                'created_at' => $created_at
            );

            // push to "data"
            array_push($posts_arr['data'], $post_item);
        } 
        // Convert to json and output
        echo json_encode($posts_arr);

        } else {
            // no Posts
            echo json_encode(
                array('message' => 'No Post Found')
            );
    }