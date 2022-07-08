<?php
    include_once ("Model/ClothesRental.php");
    
    class Model{
        //database baju yang dapat disewakan
        public function getClothesList(){
            return array(
                "kebaya" => new ClothesRental("Kebaya Jawa Tengah", "Baju Adat", "Wanita", "Rp.50.000"),
                "jawiJangkep" => new ClothesRental("Jawi Jangkep Jawa Tengah", "Baju Adat", "Pria", "Rp.90.000"),
                "koteka" => new ClothesRental("Koteka Papua", "Baju Adat", "Pria", "Rp.30.000"),
                "polisiAnakLaki" => new ClothesRental("Polisi Anak Laki", "Profesi", "Anak Laki", "Rp.20.000"),
                "polisi" => new ClothesRental("Polisi", "Profesi", "Pria", "Rp.40.000"),
                "cosplayEula" => new ClothesRental("Cosplay Eula Genshin Impact", "Baju Cosplay", "Wanita", "Rp.120.000"),
                "cosplayIrithel" => new ClothesRental("Cosplay Hero Mobile Legend", "Baju Cosplay","Wanita", "Rp.160.000")
            );
        }
        //mengembalikan seluruh list baju berdasarkan nama
        public function getClothes($name){
            $allClothes = $this->getClothesList();
            return [$allClothes[$name]];
        }
    }
?>