<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "tokonovel";
$conn = new mysqli($hostName, $userName, $password, $dbName);

if ($conn) {
    // echo "connected";
} else {
    echo "not connected";
}
