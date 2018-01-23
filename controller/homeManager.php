<?php

if (!isset($_SESSION['logged']) OR $_SESSION['logged'] != true) {
    $_SESSION['user_type'] = 'unknown';
    require('view/homeView.php');
} else {
    require('view/loggedView.php');
}
