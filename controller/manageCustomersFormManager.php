<?php

if ($_SESSION['logged'] == true) {
    require('view/manageCustomersView.php');
} else {
    require('view/homeView.php');
}
