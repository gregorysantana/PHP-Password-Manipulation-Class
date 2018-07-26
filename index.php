<?php


require_once 'classes/PasswordMAnipulation.php';

$pass = new PasswordMAnipulation();
$genPass = $pass->generatePassword();
$hashPass = $pass->hashPassword("!?HhLXN%B5.$@|_(x>,/#*+'*z\)^~:+/S-I<&j/");

var_dump($genPass);
echo '<br>';
var_dump($pass->hashMatched("!?HhLXN%B5.$@|_(x>,/#*+'*z\)^~:+/S-I<&j/", $hashPass));
echo '<br>';
var_dump($pass->isValid($genPass));
