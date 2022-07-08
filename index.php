<?php
require_once("Helper/DB.php");

require __DIR__ . "/Controller/ClothesController.php";
$request = $_SERVER['REQUEST_URI'];
$folder = "/mvc";
switch ($request) {
    case $folder."" :
        ClothesController::index();
        break;
    case $folder."/" :
        ClothesController::index();
        break;
    case $folder."/baju/insert" :
        ClothesController::insert();
        break;
    default:
        http_response_code(404);
        echo "404";
        // require __DIR__ . '/views/404.php';
        break;
}

DB::closeConnection();

?>