<?php

$servername = "localhost";
$username = "postgress";
$password = "";

try {
    $conn = new PDO("mysql:host=$127.0.0.1;dbname=public", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
<h1>Scripture Resources</h1>
//posting a suggestion here
<?php
$statement = $db->prepare("SELECT book, chapter, verse, content FROM scriptures");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo '<p>';
    echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
    echo $row['verse'] . '</strong>' . ' - "' . $row['content'] . '"'; // instructions say the verse needs to be in quotes
    echo '</p>';
}
?>
</body>

</html>