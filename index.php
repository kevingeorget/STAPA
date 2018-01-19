<?php
session_start();
//if ($_SESSION['logged'])

// TEST
if (isset($_GET['action'])) {
    echo 'ACTION='.$_GET['action'];
} else {
    echo 'pas action';
}
echo '<br />USERTYPE='.$_SESSION['user_type'];
echo '<br />LOGGED='.$_SESSION['logged'];
// FIN TEST


if (!isset($_GET['action'])) {
    require('controller/homeManager.php');
} else {
    switch($_GET['action']) {
        case 'home':
            require('controller/homeManager.php');
            break;
        case 'log':
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
