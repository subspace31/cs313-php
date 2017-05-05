<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Your major is: <?php echo $_POST["major"]; ?><br>
Your comments: <?php
    $comment = $_POST['comment'];
    echo $comment;
?><br>
Continents you visited: 
<?php
if(!empty($_POST['check']))
	foreach($_POST['check'] as $selected) {
		echo "<p>" .$selected ."</p>";
	}
?>


</body>
</html>