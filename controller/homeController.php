<?php

class Home {

    private $dbRemote;

    public function __construct($database) {
        $this->dbRemote = $database;
    }

    public function runScript() {
        require VIEW_PATH . 'home.php';
    }

}