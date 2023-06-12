<?php 
require 'config/constants.php';
// Destroy all sessioin and redirect user to login page
session_destroy();
header('location: ' . ROOT . 'signin.php');
die();
