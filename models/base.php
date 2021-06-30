<?php

class Base {
    public $db;
    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=social_network;charset=utf8mb4","root", "");
    }
}

