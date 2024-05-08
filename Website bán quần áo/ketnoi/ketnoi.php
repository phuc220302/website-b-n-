<?php
    $conn = new mysqli("localhost","root","","web_nhom");

    // Check connection
    if ($conn->connect_errno) {
    echo "kết nối thất bại " . $conn->connect_error;
    exit();
    }
?>