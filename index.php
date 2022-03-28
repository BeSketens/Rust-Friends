<?php

require_once './model/Db.class.php';

# global variables
const VIEW_PATH = 'view/';
const MODEL_PATH = 'model/';
const CONTROLLER_PATH = 'controller/';

# db access
$db = Db::getInstance();

# header
require VIEW_PATH . 'header.php';

# get action
isset($_GET['action']) ? $action = htmlentities($_GET['action']) : $action = false;

# which action into controller
switch ($action) {
    case 'accountCreation' :
        require CONTROLLER_PATH . 'accountCreationController.php';
        $controller = new Account($db);
        break;
    case 'login' :
        require CONTROLLER_PATH . 'login.php';
        $controller = new Login($db);
        break;
    default :
        require CONTROLLER_PATH . 'homeController.php';
        $controller = new Home($db);
}

# run controller
$controller->runScript();

# footer
require VIEW_PATH . 'footer.php';