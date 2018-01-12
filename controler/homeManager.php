<?php 

$test['profil'] = 'supervisor';
//$test['profil'] = 'administrator';

require ("../vue/navLeft.php");


//echo $navLeftTemplate;

echo $test;

$content = ("../vue/loginView.php");

require("../vue/template.php");