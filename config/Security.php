<?php 

class Security{
    
    public static function secureHTML($string){
        return trim(strip_tags($string));
    }

    public static function verifAccess(){
        
        return (!empty($_SESSION['access']) && $_SESSION['access'] === "admin");
         
    }
}