<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category']) && isset($_POST['search-input'])) {
    require("function.php");
    require_once("classes.php");
    session_start();

    $category = $_POST['category'];
    $input = $_POST['search-input'];

    // echo $category . " " . $input;

    // Identify table and column
    $table = "";
    $col = "";
    switch ($category) {
        case "fullName":
            $table = "user";
            $col = "fullname";
            break;
        case "studentID":
            $table = "user";
            $col = "uid";
            break;
        case "identityCode":
            $table = "biography";
            $col = "identityCode";
            break;
        case "className":
            $table = "class";
            $col = "classname";
            break;
    }

    // SQL syntax
    $sql = "SELECT * FROM {$table} ";
    $whereClause = "";
    if ($input != "" && str_replace(" ", "", $input) != "") {
        $whereClause = "WHERE {$col} LIKE '%{$input}%' ";
    }
    $sql = $sql . $whereClause;
    $result = execute($sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['STUDENT'] = array();
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            $_SESSION['found'] = 1;

            // Collect data
            if ($table == "user") {

                $collectSql = "SELECT * FROM biography WHERE bid = '{$row['uid']}' ";
                $collectRes = execute($collectSql);
                $collectData = mysqli_fetch_assoc($collectRes);

                $sql = "SELECT classname FROM class WHERE cid = '{$collectData['cid']}' ";
                $res = execute($sql);
                $class = mysqli_fetch_assoc($res);

                // Create students information object
                $_SESSION['STUDENT'][] = new STUDENT(
                    $row['uid'],
                    $row['fullname'],
                    $row['username'],
                    $row['email'],
                    $collectData['identityCode'],
                    $collectData['medicalCode'],
                    $collectData['schoolYear'],
                    $collectData['phoneNumber'],
                    $class['classname'],
                );
            }

            header("Location: ../pages/studentInfo.php");
            // exit();
        }
        // print_r($_SESSION['STUDENT']);
    } else {
        $_SESSION['found'] = 0;
        // print_r($_SESSION);
        header("Location: ../index.php");
        // exit();
    }
}
