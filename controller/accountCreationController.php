<?php

class Account {

    private $dbRemote;

    public function __construct($database)
    {
        $this->dbRemote = $database;
    }

    public function runScript()
    {
        # password_hash($password, CRYPT_BLOWFISH);

        require VIEW_PATH . 'accountCreation.php';
    }

}