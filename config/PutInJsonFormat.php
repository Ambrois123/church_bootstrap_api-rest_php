<?php 

abstract class PutInJsonFormat 
{
    protected function sendJson($data)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        
        echo json_encode($data);
    }

    protected function SendNotFound()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("HTTP/1.0 404 Not Found");
        exit();
    }
    
}