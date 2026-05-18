<?php

header("Content-Type: application/json");

/*
========================
FONCTION RESPONSE
========================
*/
function response($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

/*
========================
SIMULATION ROUTER SIMPLE
========================
*/
$method = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];

/*
========================
CAS 1 : GET /api/tools/999
========================
*/
if (preg_match("#/api/tools/([0-9]+)#", $uri, $matches) && $method === "GET") {

    $id = $matches[1];

    // simulation BDD (outil inexistant)
    $tool = null;

    if (!$tool) {
        response([
            "error" => "Tool not found",
            "message" => "Tool with ID $id does not exist"
        ], 404);
    }

    response(["data" => $tool]);
}

/*
========================
CAS 2 : POST /api/tools
========================
*/
if ($uri === "/api/tools" && $method === "POST") {

    $name = $_POST["name"] ?? "";
    $monthly_cost = $_POST["monthly_cost"] ?? "";
    $website_url = $_POST["website_url"] ?? "";

    $errors = [];

    // validation name
    if (strlen($name) < 2 || strlen($name) > 100) {
        $errors["name"] = "Name is required and must be 2-100 characters";
    }

    // validation cost
    if (!is_numeric($monthly_cost) || $monthly_cost < 0) {
        $errors["monthly_cost"] = "Must be a positive number";
    }

    // validation URL
    if (!filter_var($website_url, FILTER_VALIDATE_URL)) {
        $errors["website_url"] = "Must be a valid URL format";
    }

    // erreur 400
    if (!empty($errors)) {
        response([
            "error" => "Validation failed",
            "details" => $errors
        ], 400);
    }

    // OK
    response([
        "message" => "Tool created successfully"
    ], 201);
}

/*
========================
CAS 3 : ERREUR 500 (TEST)
========================
*/
if ($uri === "/api/error-test") {

    try {

        // simulation erreur DB
        $pdo = new PDO("mysql:host=invalid", "user", "pass");

        response(["data" => "ok"]);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        response([
            "error" => "Internal server error",
            "message" => "Database connection failed"
        ], 500);
    }
}

/*
========================
DEFAULT 404
========================
*/
response([
    "error" => "Route not found"
], 404);