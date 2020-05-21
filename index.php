<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lab 3B</title>
</head>

<body>

<?php




define('DB_USER', "root");  
define('DB_PASSWORD', ""); 
define('DB_DATABASE', "webtesting2"); 
define('DB_SERVER', "localhost"); 

// Check connection
$mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE); 
if ($mysqli->connect_errno) 
{ 
die("Failed to connect to MySQL: ".$mysqli->connect_errno); 
} 
    


?>


<form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $sql = "SELECT * FROM student_cca WHERE id = '".$_POST["id"]."'";
  $result = $mysqli->query($sql);
  
  if ($result->num_rows > 0) {

	  while($row = $result->fetch_assoc()) {
		  echo "ID: <input type='text' name='id' value='".$row["id"]."'><br><br>";
		  echo "Name: <input type='text' name='name' value='".$row["name"]."'><br><br>";
		  
		  ?>
          
          CCA:
          <?php $cca = explode(",", $row["cca"]);?> 
          <?php if(in_array("Jogging",$cca)){ ?> 
          checked="checked" <?php } ?>
            <input type="checkbox" name="cca[]" value="Jogging" checked>Jogging
            <input type="checkbox" name="cca[]" value="Swimming">Swimming
            <input type="checkbox" name="cca[]" value="Hiking">Hiking
            <input type="checkbox" name="cca[]" value="Singing">Singing
             
		  
		  <?php

	  }
  } else {
	  echo "ID: <input type='text' name='id'>";
    echo " *NRIC not found.<br><br>";
  }
  $mysqli->close();

} else {
    echo 'ID: <input type="text" name="id"><br><br>';
}

?>
<br><br>

<input type="submit" value="Send">
</form>

</body>
</html>