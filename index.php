<?php
session_start();
//if ($_SESSION['logged'])

if (!isset($_GET['action'])) {
    $_SESSION['user_type'] = 'unknown';
    require('controller/homeManager.php');
} else {
    echo $_GET['action'];
    switch($_GET['action']) {
        case 'home':
            require('controller/homeManager.php');
            break;
        case 'log':
            echo $_SESSION['logged'];
            if ($_SESSION['logged'] != true) {
                require('controller/logManager.php');
            } else {
                require('view/loggedView.php');
            }
            break;
        case 'display_queries':
            require('controller/displayQueriesFormManager.php');
            break;
        case 'get_display_query':
            require('controller/displayQueryManager.php');
            break;
        case 'manage_customers':
            require('controller/manageCustomersFormManager.php');
            break;
        case 'admin_users':
            require('controller/adminUsersFormManager.php');
            break;
        case 'logout':
            $_SESSION['logged'] = false;
            $_SESSION['user_type'] = 'unknown';
            require('controller/homeManager.php');
            break;
        default:
            require('view/errorView.php');
            break;
    }
}
