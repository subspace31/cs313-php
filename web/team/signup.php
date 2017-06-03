<?php // signup.php

require('dbConnect.php');

if ($REQUEST_METHOD === 'POST') {
    // do some validation

    $ERRORS = array();
    $USERNAME = $_POST['username'];
    if ( $USERNAME === '') {
        $ERRORS['username'] = 'Username is required';
        // should really do a db query to check for username already in use
    }
    $PASSWORD = $_POST['password'];
    if ($PASSWORD === '') {
        $ERRORS['password'] = 'Password is required';
    }

    if (count($ERRORS) == 0) { // on success

        // insert into db
        $user_statement = $db->prepare("insert into users (username, password) values (:username, :password)" );
        try {
            $user_statement->execute(array("username"=>$USERNAME, "password"=>$PASSWORD));
        }
        catch (Exception $ex)
        {
            // Please be aware that you don't want to output the Exception message in
            // a production environment
            echo "Error with DB. Details: $ex";
            die();
        }

        header("Location: welcome.php");
        $_SESSION['user_id'] = $db->lastInsertId();
        die();
    }



    // set $SESSION['user'] or whatever
    // redirect

    // on failure
    // return with errors
}
?>
<html>
<head>
    <title>Signup</title>
    <style type='text/css'>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<form id="signup-form" method=POST>
    <div class="error"><?php echo $ERRORS['username'] ?></div>
    <input type=text name=username placeholder=Username>
    <div class="error"><?php echo $ERRORS['password'] ?></div>
    <input type=password name=password placeholder=Password>
    <input type=submit value="Sign up">
</form>
</body>
</html>
