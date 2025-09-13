<?php
require_once("@connect.php");

function execute(string $sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function fixObject(&$object)
{
    if (!is_object($object) && gettype($object) == 'object')
        return ($object = unserialize(serialize($object)));
    return $object;
}
