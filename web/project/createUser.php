<?php
session_start();

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:reddragon@localhost:5432/postgres";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
}

$username = $_POST["username"];

if ($username !== null) {
    $user_hash = password_hash($username, PASSWORD_DEFAULT);
    $statement = $db->prepare("select email FROM users WHERE users.email = ?;");
    if ($statement->execute($user_hash)) {
        while ($row = $statement->fetch()) {
            if ($row === null) {
                echo 'success';
            }else echo 'username taken';
        }
    } else echo 'error1';
} else echo $username . ' error 2';

