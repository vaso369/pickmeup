<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../config/connection.php";
    include "functions.php";

    $limit = $_GET['limit'];
    $users =  getUsersAll($limit);
    $num_of_users = get_paginationUsers_count();

    // Da bi stranica u 1 json-u vratila vise podataka
    echo json_encode([
        "users" => $users,
        "num_of_users" => $num_of_users
    ]);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400); // Bad request
}