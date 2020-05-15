<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../config/connection.php";
    include "functions.php";

    $limit = $_GET['limit'];
    $transports =  getTransportsAll($limit);
    $num_of_transports = get_pagination_count();

    // Da bi stranica u 1 json-u vratila vise podataka
    echo json_encode([
        "transports" => $transports,
        "num_of_transports" => $num_of_transports
    ]);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400); // Bad request
}