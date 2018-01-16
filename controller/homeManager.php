<?php

if ($_SESSION['logged'] != true) {
    require('view/homeView.php');
} else {
    require('view/loggedView.php');
}
