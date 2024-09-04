<?php

class database
{
    private static $dbname="burger_code";
    private static $dbuser="root";
    private static $dbhost="localhost";
    private static $dbuserpassword="";
    private static $cnx=null;
    public static function connect(){
        try{
            self::$cnx=new PDO("mysql:host=". self::$dbhost . ";port=4306;dbname=". self::$dbname , self::$dbuser, self::$dbuserpassword);
        }
        catch(PDOException $e){
        die($e->getmessage());
        }
        return self::$cnx;
    }
    public static function disconnect(){
        self::$cnx=null;
    }
}

?>