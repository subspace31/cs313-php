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

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];
$topic = $_POST['topic'];

echo 'book='.$book;


$stmt = $db->prepare("insert into scriptures (book, chapter, verse, content) values (:book, :chapter, :verse, :content)");
$stmt->bindParam(':book', $book);
$stmt->bindParam(':chapter', $chapter);
$stmt->bindParam(':verse', $verse);
$stmt->bindParam(':content', $content);
$stmt->execute();


$stmt = $db->prepare("insert into topicLink (scripture_id, topic_id) VALUES (
:id
,(select id
  from topic
  where topic.name = :topic)
);");
$stmt->bindParam(':id', $db->lastInsertId());
$stmt->bindParam(':topic', $topic);
$stmt->execute();