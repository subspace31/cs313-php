<?php
session_start();

require 'db_connect.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
//        case 'google' : google();break;
        case 'facebook' : break;
        case 'login' : login();break;
        case 'create' : accountCreate();break;
        case 'createC' : accountCreateC();break;
        case 'loginC' : loginC();break;
    }
} else echo 'error selecting action';
/*
function google() {
    global $db;
    if(isset($_POST["token"])) {
        $token = $_POST["token"];
        $statement = $db->prepare("select user_id from users where users.token = '".$token."';");
        $statement->execute();
        $count = $statement->rowCount();

        if($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION["userID"] = $row["user_id"];
            $_SESSION["fullName"] = $_POST["fullName"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["pic"] = $_POST["pic"];

            echo $row["user_id"];
        } else {
            $stmt = $db->prepare("insert into users (token) values ('".$token."');");
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count > 0) {
                echo 'account created';
            }
            else echo ' error in account creation';
        }
    }
}*/

function login()  {
    global $db;
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = $_POST["password"];

        $statement = $db->prepare("select * FROM users where email = '".$email."';");
        $success = $statement->execute();
        if ($success) {
            $count = $statement->rowCount();
            if ($count > 0)
            {
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    if (password_verify($pass, $row["password"])) {
                        echo 0;
                        $_SESSION["userID"] = $row["user_id"];
                    } else echo 1;
                }
            } else echo 1;
        } else echo 2;
    } else echo 3;
}

function loginC()  {
    global $db;
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = $_POST["password"];

        $statement = $db->prepare("select * FROM sellers where email = '".$email."';");
        $success = $statement->execute();
        if ($success) {
            $count = $statement->rowCount();
            if ($count > 0)
            {
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    if (password_verify($pass, $row["password"])) {
                        echo 0;
                        $_SESSION["sellerID"] = $row["seller_id"];
                    } else echo 1;
                }
            } else echo 1;
        } else echo 2;
    } else echo 3;
}

function accountCreate() {
    global $db;
    if(isset($_POST["email"]) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $statement = $db->prepare("select email, password FROM users where email = '".$email."';");
        if ($statement->execute()) {
            $count = $statement->rowCount();
            if ($count > 0) {
                echo 'Email already registered';
            } else {
                $stmt = $db->prepare("insert into users (email, password) values (:email, :password);");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $pass);
                if ($stmt->execute()) {
                    echo 'account created';
                    $_SESSION['userID'] = $db->lastInsertId();
                } else echo 'statement 2 error';
            }
        } else echo 'Statement Error';
    }
}

function accountCreateC() {
    global $db;
    if(isset($_POST["email"]) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $statement = $db->prepare("select email, password FROM sellers where email = '".$email."';");
        if ($statement->execute()) {
            $count = $statement->rowCount();
            if ($count > 0) {
                echo 'Email already registered';
            } else {
                $stmt = $db->prepare("insert into sellers (email, password) values (:email, :password);");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $pass);
                if ($stmt->execute()) {
                    $_SESSION['sellerID'] = $db->lastInsertId();
                    echo 'addListing.php';
                } else echo 'statement 2 error';
            }
        } else echo 'Statement Error';
    }
}
