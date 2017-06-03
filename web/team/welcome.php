<?php //login.php
session_start();

require('dbConnect.php');

$invalidLogin = false;

//checking for POST variables
if (isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT password, id FROM login WHERE username=:username';

    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);

    $result = $statement->execute();

    if($result)
    {
        $row = $statement->fetch();
        $hashPassword = $row['password'];

        //checking to see if password entered matches the hashed password
        if(password_verify($password, $hashPassword))
        {
            //password matched
            $_SESSION['user_id'] = $username;
            header("Location: welcome.php");
            die();
        }
        else
        {
            //password didn't match.
            $invalidLogin = true;
        }
    }
    else
    {
        $invalidLogin = true;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<p>Please sign in: </p>
<form id="login-form" action="login.php" method=POST>
    <input type="text" id="username" name="username" placeholder="Username">
    <label for="username">Username</label>
    <br />
    <input type="text" id="password" name="password" placeholder="Password">
    <label for="password">Password</label>
    <br />
    <input type="submit" value="Sign In" />
</form>
<br />
<p>Don't have an account, please follow this link to sign up!</p>
<a href="signup.php">Sign Up Page</a>
</body>
</html>
