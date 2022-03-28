<?php

require_once './model/Db.class.php';

# global variables
const VIEW_PATH = 'view/';
#const MODEL_PATH = 'model/';
const CONTROLLER_PATH = 'controller/';

################################################################################

# db access
$db = Db::getInstance();

################################################################################

# get action
isset($_GET['action']) ? $action = htmlentities($_GET['action']) : $action = false;

# which action into controller
switch ($action) {
    case 'create-account' :
        require CONTROLLER_PATH . 'accountCreationController.php';
        $controller = new Account($db);
        $title = 'Create account';
        break;
    case 'login' :
        require CONTROLLER_PATH . 'loginController.php';
        $controller = new Login($db);
        $title = 'Login';
        break;
    case 'logout' :
        require CONTROLLER_PATH . 'logoutController.php';
        $controller = new Logout();
        break;
    case 'profile' :
        require CONTROLLER_PATH . 'profileDisplayController.php';
        $controller = new ProfileDisplay($db);
        $title = 'Profile';
        break;
    case 'create-profile' :
        require CONTROLLER_PATH . 'profileCreationController.php';
        $controller = new ProfileCreation($db);
        $title = 'Profile';
        break;
    case 'edit-profile' :
        require CONTROLLER_PATH . 'profileEditController.php';
        $controller = new ProfileEdit($db);
        $title = 'Profile';
        break;
    default :
        require CONTROLLER_PATH . 'homeController.php';
        $controller = new Home($db);
        $title = 'Home';
}
################################################################################

# header
require VIEW_PATH . 'header.php';

# run controller
$controller->runScript();

# footer
require VIEW_PATH . 'footer.php';