<?php

class Login {

    private $dbRemote;

    public function __construct($database)
    {
        $this->dbRemote = $database;
    }

    public function runScript()
    {
        $connected = isset($_SESSION['connected']);

        # redirected if already connected || login form correct
        if ($connected) {
            header('Location: home');
            exit();
        }

        # HTML variable in view
        $error = '';

        # if login form has been submitted
        if (isset($_POST['login-submit'])) {
            $error = $this->loginProcess();
        }

        require VIEW_PATH . 'login.php';
    }

    private function loginProcess() : string
    {
        # get form data
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        # check if any fields empty
        if (strlen($_POST['email']) == 0 || strlen($_POST['password']) == 0) {
            return 'All fields need to be filled in';
        }

        # get user infos in db
        $user = $this->dbRemote->getUser($email);

        # check if a user has been found
        if(empty($user)){
            return 'Email not found';
        }

        # check password
        if(!password_verify($password, $user['password'])){
            return 'Wrong Password';
        }

        # set up session variables
        $this->sessionStepUp($user);

        return '';
    }

    private function sessionStepUp($user)
    {
        $_SESSION['connected'] = true;
        $_SESSION['profile'] = json_decode($user['profile'], true);
        $_SESSION['username'] = $user['username'];

        $languages = json_decode($user['languages'], true);

        // setting up languages if any
        isset($languages) ? $_SESSION['languages'] = [$languages[0], $languages[1], $languages[2]] : $_SESSION['languages'] = 0;

        // can user post
        $_SESSION['posts'] = !empty($user['posts']);
    }

}