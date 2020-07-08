

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$token= isset($_POST['barcode'])?$_POST['barcode']:0;
var_dump($token);

$sql ="SELECT * FROM code WHERE token ='$token'";
$result = $conn->query($sql);
if(isset($_POST['count'])){

    if(!($_SESSION['count'])){

     $c=   $_SESSION['count'] = 0;
    }else{
        $c=1;
    }

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $sql ="SELECT * FROM code WHERE attend ='$c'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
    
        $sql ="UPDATE `code` SET `attend` = '$c' WHERE token ='$token'";
      
if ($conn->query($sql) === TRUE) {
    echo "Record successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
    }
    }else{
echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }
  }

}else{
    echo "not found"."<h2>";
  }

  echo $_SESSION['count'];
$conn->close();

?>

<form action="/barcode/check.php" method="POST">
  
  </div>
  <button type="submit" class="btn btn-primary" id="count">check</button>
</form>