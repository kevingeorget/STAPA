<?php

if ($_SESSION['logged'] != true) {
    $_SESSION['user_type'] = 'unknown';
    require('view/homeView.php');
} else {
    require('view/loggedView.php');
}
