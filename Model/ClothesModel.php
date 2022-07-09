<?php
// require_once("Helper/ToArray.php");
class ClothesModel {
    public static function getAll(){
        $query = "SELECT * FROM clothes";
        return DB::exec($query);
    }

    public static function insert($name, $type, $gender, $costPerDay){
        $query = "INSERT INTO clothes (name, type, gender, costPerDay) VALUES ('$name', '$type', '$gender', $costPerDay)";
        return DB::exec($query);
    }

    public static function update($id, $name, $type, $gender, $costPerDay){
        $query = "UPDATE clothes SET name='$name', type='$type', gender='$gender', costPerDay='$costPerDay' WHERE id='$id'";
        return DB::exec($query);
    }

    public static function delete($id){
        $query = "DELETE FROM clothes WHERE id='$id'";
        return DB::exec($query);
    }
}
?>
