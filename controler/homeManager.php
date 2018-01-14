<?php

if (!isset($_SESSION['logged']) or $_SESSION['logged'] != true) {
    $_SESSION['user_type'] = 'unlogged';
    require('view/logView.php');
} else {
    echo 'wtf' . $_SESSION['logged'] . $_SESSION['user_type'];
    session_destroy();
}
