<?php

define("HOST","localhost");
define("MAIN_DB","raccolta_dati");
define("MAIN_USER","root");
define("MAIN_PASSWORD","");

session_start();

class DBAccess{

    function __construct(){

        try {

            $this->db = new PDO("mysql:host=". HOST . ";dbname=" . MAIN_DB . ";charset=utf8", MAIN_USER, MAIN_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          } catch (Exception $e) {

            print_r($e);
            exit("err_con");

          }
    }



}