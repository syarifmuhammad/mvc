<?php 

    class ToArray {
        public static function convert($data){
            $result = [];
            foreach($data as $r){
                array_push($result, $r);
            }
            return $result;
        }
    }

?>