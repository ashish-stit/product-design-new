<h5><center>Quiz</center></h5>
<form method="post" action="quiz.php">
   <div class="input-group">
     <lable>Title</lable>
     <input type="text" name="title" required>
   </div>
   <input type="submit" name="quiz">
   <input type="submit" name="quiz" value="back">
</form>
<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "productnew";
try {
    $title = $_POST['title'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "INSERT INTO product_quiz (title)
    VALUES ('$title')";
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {

    	echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
