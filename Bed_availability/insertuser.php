<?php
$email = $_REQUEST["email"];
$f_name = $_REQUEST["f_name"];
$l_name = $_REQUEST["l_name"];
$contact = $_REQUEST["contact"];
$servername = "localhost";
$username = "medBed";
$password = "Sto@1234";
$dbname = "user_data";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
echo "fail php";
  die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM user_data WHERE email ='".$email."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //  echo json_encode(array("Email" => $row["email"], "Fname" => $row["first_name"],"Lname" => $row["last_name"],"Contact" => $row["contact"],));
      echo "Data already exists";
  }
} else {
  $sql = "INSERT INTO user_data(email,first_name,last_name,contact) VALUES ('$email', '$f_name', '$l_name', '$contact')";  
  if ($conn->query($sql) === TRUE) {
  echo "Success";
  } else {
  //echo "Error" . $sql . "<br>" . $conn->error;
      echo "Error";
  }
}
$conn->close();
?>