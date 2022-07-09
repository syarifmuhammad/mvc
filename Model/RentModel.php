<?php
// require_once("Helper/ToArray.php");
class RentModel {
    public static function getAll(){
        $query = "SELECT *,  DATEDIFF(end_date, start_date) AS hari FROM rent";
        return DB::exec($query);
    }

    public static function getDetailsRent($rent_id){
        $query = "SELECT clothes_id, rent_id, costPerDay, name FROM clothes_rent INNER JOIN clothes ON clothes_id=id WHERE rent_id=$rent_id";
        return DB::exec($query);
    }

    public static function insert($nama, $startDate, $endDate){
        $query = "INSERT INTO rent (nama, start_date, end_date) VALUES ('$nama', '$startDate', '$endDate')";
        DB::exec($query);
        return DB::getLastId();
    }

    public static function insertDetailsRent($clothes_id, $rent_id){
        $query = "INSERT INTO clothes_rent (clothes_id, rent_id) VALUES ($clothes_id, $rent_id)";
        return DB::exec($query);
    }

    public static function delete($id){
        $query = "DELETE FROM rent WHERE id='$id'";
        return DB::exec($query);
    }
}
?>
