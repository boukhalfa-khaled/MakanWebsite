<?php
session_start();
// ob_start() i do it because i have problem with the header() function 
ob_start();
define('ROOT', 'http://localhost/place/');
// conect to the database 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'place');