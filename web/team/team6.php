<?php
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
?>

<!DOCTYPE HTML>
<html lang="en">
<body>
<h1>Scripture Resources</h1>
<form method="post" action="insertTopic.php">
    <br>
    Book: <input type="text" name="book"><br>
    Chapter:<input type="number" name="chapter"><br>
    Verse:<input type="number" name="verse">
    <br>
    Content:<input type="text" name="content">
    <br>
    <select name="topic">
        <?php
        $statement = $db->prepare("SELECT name FROM topic");
        $statement->execute();

        while ($row = $statement->fetch()) {
            echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
        }
        ?>
    </select>
    <input type="submit"><!--onclick="addTopic('book', 'chapter', 'verse', 'content', 'topic')"-->
</form>



</body>


<script src="team.js"></script>

</html>