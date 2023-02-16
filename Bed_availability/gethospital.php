<?php
$q = $_REQUEST["q"];
$servername = "localhost";
$username = "medBed";
$password = "Sto@1234";
$dbname = "hospital_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
echo "fail php";
  die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM hospital_info WHERE Place_id ='".$q."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo json_encode(array("Sr_no" => $row["Sr.no"],"Name" => $row["Name"], "Bed" => $row["Beds"],"Cost" => $row["Cost"]));
  }
} else {
  echo "0";
}
?>