<?php

define('BASE_URL','http://localhost/laundry/');

class Helper {


    public function baseUrl($slug) 
    {
        echo BASE_URL . $slug;
    }

    public function redirect($message, $page)
    {
        header("Location: " . BASE_URL . $page);
    }

    public function path($page)
    {
        if($_SERVER['REQUEST_URI'] == "/laundry/" . $page) {
            return true;
        } else {
            return false;
        }
    }
    
}

$helper = new Helper;