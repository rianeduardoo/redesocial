<?php

require_once __DIR__ . "/../controllers/UsuarioController.php";

$rota = $_GET["rota"] ?? "";
$metodo = $_SERVER["REQUEST_METHOD"];

if ($rota === "usuario") {

    switch ($metodo) {

        // CREATE
        case "POST":
            createUsuario($con);
            break;

        // READ
        case "GET":
            readUsuario($con);
            break;

        // UPDATE
        case "PUT":
            updateUsuario($con);
            break;

        // DELETE
        case "DELETE":
            deleteUsuario($con);
            break;

        default:
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido"]);
            break;
    }

} else {
    http_response_code(404);
    echo json_encode(["erro" => "Rota não encontrada"]);
}