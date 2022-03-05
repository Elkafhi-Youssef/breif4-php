<?php
$servername = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'cabinet1';
try {
    $conn = new mysqli($servername,$username,$passwd,$dbname);
} catch (Exception $e) {
    die("Opps something went wrong...");
}

