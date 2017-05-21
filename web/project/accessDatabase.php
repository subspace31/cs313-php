<?php
/**
 * User: subs
 * Date: 5/18/17
 * Time: 11:21 PM
 */
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

    $cat = $_SESSION["cat"];

    if ($_POST["category"] === null || $_POST["category"] === "") {
        $statement = $db->prepare("select item_id, name ,description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE categories.id > 0 ORDER BY category_id;");
    } else {
        $statement = $db->prepare("select item_id, name ,description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE categories.category = '".$_POST["category"]."' ORDER BY category_id;");
    }

    $statement->execute();
    $itmnum = 0;
    $items = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $itmnum++;
        $row["itmnum"] = $itmnum;
        $items[] = $row;
    }
    $jsonstring  = json_encode($items);
    echo $jsonstring;
