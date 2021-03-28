<?php
//db connection constants

define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'cake_love');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($connection) {
    echo "true!";
}
