<?php


class Session
{
    public  static  function sessioninit(){
      session_start();

    }
    public  static function set($key,$value){

        $_SESSION[$key] = $value;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }

       public static function checkAdminSession(){
        self::sessioninit();
        if(self::get("adminLogin") == false){
           self::sessionDestroy();
           header("Location:login.php");
        }
    }

    public static function checkAdminLogin(){
        self::sessioninit();
        if(self::get("adminLogin") == true){
            header("Location:index.php");
        }
    }


    public static function checkSession(){
        if(self::get("login") == false){
           self::sessionDestroy();
           header("Location:index.php");
        }
    }

    public static function checkLogin(){
        if(self::get("login") == true){
           header("Location:exam.php");
        }
    }

    public static function sessionDestroy(){

        session_destroy();
        session_unset();
       
    }
}