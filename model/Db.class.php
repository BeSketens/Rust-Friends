<?php

class Db {

    private static $instance = null;
    private $db;

    private function __construct(){
        try {
            return $this->db = new PDO("mysql:host=localhost;dbname=rust_friends;charset=utf8", "root", "");
        } catch (Exception $e) {
            die("Error : " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getUser($email) {
        $request = $this->db->prepare('SELECT username, email, user_id, password, profile, posts, languages FROM users WHERE email = ?');
        $request->execute(array($email));

        return $request->fetch();
    }

    public function getUserProfile($username) {
        $request = $this->db->prepare('SELECT profile FROM users WHERE username = ?');
        $request->execute(array($username));

        return $request->fetch();
    }

    public function doesEmailExist($email) : bool {
        $request = $this->db->prepare('SELECT COUNT(email) FROM users WHERE email = ?');
        $request->execute(array($email));

        return $request->fetchColumn() >= 1;
    }

    public function doesUsernameExist($username) : bool {
        $request = $this->db->prepare('SELECT COUNT(username) FROM users WHERE username = ?');
        $request->execute(array($username));

        return $request->fetchColumn() >= 1;
    }

    public function createUser($username, $passwordToStore, $email, $date) : void {
        $request = $this->db->prepare('  INSERT INTO users(username, password, email, creation_date) VALUES(?,?,?,?)');
        $request->execute(array($username, $passwordToStore, $email, $date));
    }

    public function doesAccountExist($account) : bool {
        return empty($account);
    }

    public function updateUserProfile($profile, $languages, $id) : void {
        $request = $this->db->prepare('UPDATE users SET profile = ?, languages = ? WHERE user_id = ?');
        $request->execute(array($profile, $languages, $id));
    }

}