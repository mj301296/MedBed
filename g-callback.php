<?php
	require_once "config.php";
    echo "inside";
	if (isset($_SESSION['access_token'])){
        echo "inside2";
		$gClient->setAccessToken($_SESSION['access_token']);
    }
	else if (isset($_GET['code'])) {
        echo "inside3";
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
        echo "inside4";
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];

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
    $sql = "SELECT * FROM user_data WHERE g_id ='".$_SESSION['id']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      //  echo json_encode(array("Email" => $row["email"], "Fname" => $row["first_name"],"Lname" => $row["last_name"],"Contact" => $row["contact"],));
          echo "Data already exists";
      }
    } else {
        $sql = "INSERT INTO user_data(email,first_name,last_name,g_id) VALUES ('".$_SESSION['email']."','".$_SESSION['givenName']."','".$_SESSION['familyName']."','".$_SESSION['id']."')";
      if ($conn->query($sql) === TRUE) {
      echo "Success";
      } else {
      //echo "Error" . $sql . "<br>" . $conn->error;
          echo "Error";
          exit();
      }
    }
    $conn->close();
    

	header('Location: Bed_availability/places.php');
	exit();
?>
