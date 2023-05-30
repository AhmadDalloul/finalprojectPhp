<?php

if (!function_exists('getConnection')) {
    function getConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ahmeddalloul";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("فشل الاتصال: " . mysqli_connect_error());
        }

        return $conn;
    }
}
