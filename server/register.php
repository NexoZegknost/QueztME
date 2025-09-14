<?php

if (isset($_POST['username'])) {
    require("function.php");
    session_start();

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $icode = $_POST['icode'];
    $mcode = $_POST['mcode'];
    $class = strtolower($_POST['class']);
    $year = $_POST['year'];

    // Password validation
    if ($password == $repassword) {
        // Username & Email validation
        $uSQLvalid = "SELECT * FROM user WHERE username = '{$username}' OR email = '{$email}' ";
        $uRes = execute($uSQLvalid);
        if (mysqli_num_rows($uRes) == 0) {
            $password = md5($password);
            // Class validation
            $classSQl = "SELECT cid FROM class WHERE classname = '{$class}' ";
            $cRes = execute($classSQl);
            if (mysqli_num_rows($cRes) == 1) {
                $cid = mysqli_fetch_row($cRes)[0];

                // Insert data
                $userSQL = "INSERT INTO user (username, fullname, email, `password`) VALUES ('{$username}', '{$fullname}', '{$email}', '{$password}' )";
                execute($userSQL);
                $bioSQL = "INSERT INTO biography (cid, identityCode, medicalCode, schoolYear, phoneNumber) VALUES ('{$cid}', '{$icode}', '{$mcode}', '{$year}', '$phone')";
                execute($bioSQL);
                $_SESSION['creation'] = "success";
                header("Location: ../index.php");
            }
        } else {
            $_SESSION['creation'] = "username/email";
            header("Location: ../pages/register.php");
        }
    } else {
        $_SESSION['creation'] = "password";
        header("Location: ../pages/register.php");
    }
}
