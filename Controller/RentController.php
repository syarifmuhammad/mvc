<?php
include_once("Model/RentModel.php");
include_once("Model/ClothesModel.php");
class RentController  {

     public static function index(){
          $rent = RentModel::getAll();
          $new_rent = [];
          foreach($rent as $r){
               $new_r = $r;
               $new_r["baju"] = RentModel::getDetailsRent($r["id"]);
               $new_r["harga"] = 0;
               foreach($new_r["baju"] as $baju){
                    $new_r["harga"] += $baju["costPerDay"];
               }
               array_push($new_rent, $new_r);
          }
          $clothes = ClothesModel::getAll();
          $rent = $new_rent;
          require_once("Views/ViewRent.php");
     }

     public static function insert(){
          if(isset($_POST["submit"])){
               $nama = $_POST["nama"];
               $clothes_id = $_POST["clothes_id"];
               $hari = $_POST["hari"];
               $startDate=date('Y-m-d');
               $endDate=Date('Y-m-d', strtotime("+".$hari." days"));
               $rent_id = RentModel::insert($nama, $startDate, $endDate);
               foreach($clothes_id as $data){
                    RentModel::insertDetailsRent($data, $rent_id);
               }
          }
          $url = "http://".$_SERVER["SERVER_NAME"]."/mvc/rent";
          header('Location: ' . $url);
     }

     public static function delete(){
          if(isset($_POST["submit"])){
               $id = $_POST["id"];
               $clothes = RentModel::delete($id);
          }
          $url = "http://".$_SERVER["SERVER_NAME"]."/mvc/rent";
          header('Location: ' . $url);
     }


}
?>