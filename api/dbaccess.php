<?php

define("HOST","localhost");
define("MAIN_DB","raccolta_dati");
define("MAIN_USER","root");
define("MAIN_PASSWORD","");
date_default_timezone_set('Europe/Rome');

class DBAccess{

    function __construct(){

        try {

            $db = new PDO("mysql:host=". HOST . ";dbname=" . MAIN_DB . ";charset=utf8", MAIN_USER, MAIN_PASSWORD);
            $db->exec("SET time_zone='Europe/Rome';");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          } catch (Exception $e) {

            print_r($e);
            exit("err_con");

          }
    }

}

new DBAccess();