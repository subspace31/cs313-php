<?php
session_start();

require 'db_connect.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'google' : google();break;
        case 'facebook' : break;
        case 'login' : login();break;
        case 'create' : accountCreate();break;
    }
}

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
}

function login()  {
    global $db;
    if (isset($_POST["email"]) && !empty($_POST['email'])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $statement = $db->prepare("select * FROM users where email = '".$email."';");
        if ($statement->execute()) {
            while ($row = $statement->fetch()) {
                if (password_verify($pass, $row["password"])) {
                    echo 'account verified';
                    $_SESSION["userID"] = $row["user_id"];
                    $_SESSION["fullName"] = $_POST['fullName'];
                    $_SESSION["email"] = $_POST['email'];
                    $_SESSION["pic"] = $_POST['pic'];
                }

                else echo 'incorrect password';
            }
        } else {
            echo 'Statement Error';
        }
    } else echo 'Post Error';
}

function accountCreate() {
    global $db;
    if(isset($_POST["email"]) && !empty($_POST['email'])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $statement = $db->prepare("select email, password FROM users where email = '".$email."';");
        if ($statement->execute()) {
            $count = $statement->rowCount();
            if ($count > 0) {
                echo 'Email already registered';
            } else {

            }
        } else echo 'Statement Error';
    }
}

