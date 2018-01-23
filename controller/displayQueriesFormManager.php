<?php

if ($_SESSION['logged'] == true) {
    require('view/displayQueriesFormView.php');
} else {
    require('view/homeView.php');
}
