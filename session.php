<?php

/* 
   Session class
*/

class Session{
    
    //to start the session
    public static function init(){
        session_start();
    }
    
    //to set the session
    public static function set($key , $val){
        $_SESSION['$key'] = $val;
    }
    
    //to get the session
    public static function get(){
        if(isset($_SESSION['$key'])){
            return $_SESSION['$key'];
        }
        else {
            return FALSE;
        }
    }
    
    //to destroy the session
    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }
    
    //to check the session
    public static function checkSession(){
        self::init();
        if(self::get("login") == FALSE){
            self::destroy();
            header("Location:login.php");
        }
    }
    
}
