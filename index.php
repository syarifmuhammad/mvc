<?php
require_once("Helper/DB.php");

require __DIR__ . "/Controller/ClothesController.php";
require __DIR__ . "/Controller/RentController.php";
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
    case $folder."/baju/update" :
        ClothesController::update();
        break;
    case $folder."/baju/delete" :
        ClothesController::delete();
        break;
    case $folder."/rent" :
        RentController::index();
        break;
    case $folder."/rent/insert" :
        RentController::insert();
        break;
    case $folder."/rent/delete" :
        RentController::delete();
        break;
    default:
        http_response_code(404);
        echo "404";
        // require __DIR__ . '/views/404.php';
        break;
}

DB::closeConnection();

?>