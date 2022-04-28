<?php

ini_set('display_errors', 0);
include_once 'config.php';
$sql = "CREATE TABLE notes(id int unsigned auto_increment primary key, text varchar(255));";

$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($database->connect_errno !== 0){
    exit($database->connect_error);
}
$result = $database->query($sql);

echo 'database structure: ' . ($result ? 'true' : 'false');