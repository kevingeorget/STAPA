<?php

if ($_SESSION['logged'] == true) {
    require('view/adminUsersFormView.php');
} else {
    require('view/homeView.php');
}
