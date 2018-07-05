<?php

$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "studentdb";
$dsn      = "mysql:host=$host;dbname=$dbname";
$options  = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_LOCAL_INFILE => true
);