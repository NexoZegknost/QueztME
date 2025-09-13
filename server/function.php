<?php
require_once("@connect.php");

function execute(string $sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result;
}
