<?php

class Database {

    public function DBConnect() {
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "laundry";

        try {
            $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
            $dbConnection->exec("set names utf8");
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        } catch(PDOException $e) {
            return "Connection Failed " . $e.getMessage();
        }
    }
} 

