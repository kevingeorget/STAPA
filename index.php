<?php
session_start();

if (!isset($_GET['action'])) {
    echo 'bravo';
    require('controler/homeManager.php');
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
