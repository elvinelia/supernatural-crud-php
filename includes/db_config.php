<?php
 define('DB_HOST', 'localhost');
 define("DB_USER", 'root');
 define("DB_PASS", "rubicon30$");
    define("DB_NAME", "supernatural_db");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    