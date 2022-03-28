<?php

class Home {

    private $dbRemote;

    public function __construct($database) {
        $this->dbRemote = $database;
    }

    public function runScript() {

        $connected = isset($_SESSION['connected']);

        if (!$connected) {
            header('Location: login');
            exit();
        }

        # redirect to create profile if not done yet
        if (empty($_SESSION['profile'])) {
            header('Location: create-profile');
            exit();
        }


        require VIEW_PATH . 'home.php';
    }

}