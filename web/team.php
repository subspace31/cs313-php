<!DOCTYPE HTML>
<html>  
<body>

<form action="team2.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<p>What is your Major?:</p>
    
<?php 
    $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering", "Software Engineering");
    
    foreach ($majors as $value) {
        echo '<input type="radio" name="major" value="' . $value . '">  ' . $value . '<br>';
    }
    
    ?>
    
    <p>Comments:</p>
<textarea rows="4" cols="50" name="comment" placeholder="Enter comments here...">
</textarea>
    
<p>Which Continents have you visited?:</p>
<input type="checkbox" name="check[]" value="North America"> North America<br>
<input type="checkbox" name="check[]" value="South America"> South America<br>
<input type="checkbox" name="check[]" value="Europe"> Europe<br>
<input type="checkbox" name="check[]" value="Asia"> Asia<br>
<input type="checkbox" name="check[]" value="Australia"> Australia<br>
<input type="checkbox" name="check[]" value="Africa"> Africa<br>
<input type="checkbox" name="check[]" value="Antarctica"> Antarctica<br>
<input type="submit">
</form>

</body>
</html>