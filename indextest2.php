<?php

if (!isset($_GET['action'])) {
    $navLeft['unlogged'] = '';
    $_SESSION['user_type'] = 'unlogged';
    $_SESSION['logged'] = false;
    require('view/logView.php');
} else {
    switch($_GET['action']) {
        case 'log':
        require('controler/logManager.php');

        break;
    }
}




/*switch ($_GET['action']) {
    case 'home':
    break;
    case '':
    require('view/logView.php');
}*/
