<?php
// require_once("Helper/ToArray.php");
class ClothesRental {
    public static function getAll(){
        $query = "SELECT * FROM clothes";
        return DB::exec($query);
    }

    public static function insert($name, $type, $gender, $costPerDay){
        $query = "INSERT INTO clothes (name, type, gender, costPerDay) VALUES ('$name', '$type', '$gender', $costPerDay)";
        return DB::exec($query);
    }
}
?>
