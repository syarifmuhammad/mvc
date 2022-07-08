<?php
include_once("Model/ClothesRental.php");
class ClothesController  {

     public static function index(){
          $clothes = ClothesRental::getAll();
          require_once("Views/ViewClothes.php");
     }

     public static function insert(){
          if(isset($_POST["submit"])){
               $name = $_POST["name"];
               $type = $_POST["type"];
               $gender = $_POST["gender"];
               $costPerDay = $_POST["costPerDay"];
               $clothes = ClothesRental::insert($name, $type, $gender, $costPerDay);
          }
          $url = "http://".$_SERVER["SERVER_NAME"]."/mvc/";
          header('Location: ' . $url);
     }


}
?>