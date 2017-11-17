<?php
class Autoloader{
    
    //register des require
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
    //fonction qui defini les require
    static function autoload($class){
        require "./class/".$class.".php";
    }
}
