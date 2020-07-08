

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<a href="/barcode/index.php?barcode=$_GET['barcode']"></a>
<form action="/barcode/index.php" method="POST">
<div class="container p-3 my-b3 bg-primary text-white">


  <div class="form-group" >
    <label for="barcode">Barcode:</label>
    <input type="text" class="form-control" placeholder="Enter Barcode" id="barcode" name="barcode" required>
    </div>
    
    </div>
    </div>
    <div class="container">
    </div>
  <p><button type="submit" class="btn btn-primary">check</button></p>
   
    
    
  
  </div>
  </div>
</form>

<php>


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


$sql ="SELECT * FROM code WHERE token ='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 

  $attend=$row["attend"];
  

if($attend==0){
    $sql = "UPDATE code SET attend='1' WHERE  token ='$token'";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Record updated successfully');</script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
}elseif($attend==1 ){
    echo "<script>alert('already entered');</script>";
}


    
  } }else {
      if($token===0){
        echo " <script>alert('welcome');</script>";
      }else{
      echo " <script>alert('not found');</script>";
      }
  }


$conn->close();

?>

