<?php
require 'php/autoload.php';

if(isset($_SESSION['login-effect'])){
    header('Location: /home');
}
else if(!isset($_SESSION['login-effect'])){
    header('Location: /login');
}