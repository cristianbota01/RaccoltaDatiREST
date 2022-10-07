<?php

require_once("./logic.php");

class Middleware{
    
    function __construct($request){
        $this->request = $request;
        $this->logic = new Logic();
        $this->SwitchRequestMethod();
    }

    private function SwitchRequestMethod(){
        switch ($this->request["REQUEST_METHOD"]){
            case "GET":{
                $this->SwitchMethodGet();
            } break;
            case "POST":{
                $this->SwitchMethodPost();
            } break;
            case "PUT":{
                $this->SwitchMethodPut();
            } break;
            case "DELETE":{
                $this->SwitchMethodDelete();
            } break;
        }
    }

    private function SwitchMethodGet(){
        
    }

    private function SwitchMethodPost(){
       
    }

    private function SwitchMethodPut(){
        
    }

    private function SwitchMethodDelete(){
        
    }
}

new Middleware($_SERVER);