<?php
// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
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