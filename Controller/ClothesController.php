<?php
include_once("Model/ClothesModel.php");
class ClothesController  {

     public static function index(){
          $clothes = ClothesModel::getAll();
          require_once("Views/ViewClothes.php");
     }

     public static function insert(){
          if(isset($_POST["submit"])){
               $name = $_POST["name"];
               $type = $_POST["type"];
               $gender = $_POST["gender"];
               $costPerDay = $_POST["costPerDay"];
               $clothes = ClothesModel::insert($name, $type, $gender, $costPerDay);
          }
          $url = "http://".$_SERVER["SERVER_NAME"]."/mvc/";
          header('Location: ' . $url);
     }
     
     public static function update(){
          if(isset($_POST["submit"])){
               $id = $_POST["id"];
               $name = $_POST["name"];
               $type = $_POST["type"];
               $gender = $_POST["gender"];
               $costPerDay = $_POST["costPerDay"];
               $clothes = ClothesModel::update($id, $name, $type, $gender, $costPerDay);
          }
          $url = "http://".$_SERVER["SERVER_NAME"]."/mvc/";
          header('Location: ' . $url);
     }

     public static function delete(){
          if(isset($_POST["submit"])){
               $id = $_POST["id"];
               $clothes = ClothesModel::delete($id);
          }
          $url = "http://".$_SERVER["SERVER_NAME"]."/mvc/";
          header('Location: ' . $url);
     }


}
?>