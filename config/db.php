<?php

class DB{
    public static function connectDB($host ='localhost',$user='root',$pwd='',$db='torreGlories'){
        $con = new mysqli($host,$user,$pwd,$db);

        if($con == false){
            die('DATABASE ERROR');
        }else{
            return $con;
        }


    }
}

?>