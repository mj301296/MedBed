<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: /MEDBED/login.php');
		exit();
	}
?>

<html>
  <head>
    <title>Hospital Search</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="Bed/bed.css">
    <script src="Bed/bed.js"></script>
    </head>      

      
      
      
    <script>

    </script>
    
<body>
<script type="text/javascript">

</script>
    
<!--
    
<div id="modalRegisterForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
            </div>
            <div class="modal-body">
 
                <form role="form" >
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg validate" name="email">
                            <button class="btn btn-success " onclick="checkRecord(email.value)" data-dismiss="modal">check</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <div>
                            <input type="text" class="form-control input-lg validate" name="fname" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <div>
                            <input type="text" class="form-control input-lg validate" name="lname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contact</label>
                        <div>
                            <input type="text" class="form-control input-lg validate" name="contact">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer d-flex justify-content-center">
                        
                            <button type="submit" class="btn btn-success" onclick="insertUser(email.value, fname.value, lname.value, contact.value)" data-dismiss="modal">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-dialog --
</div><!-- /.modal -->

      
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ">
    <li class="nav-item active">
      <a class="nav-link" href="#">MEDBED</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Book</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About us</a>
    </li>
    </ul>
    </div>
    <ul class="navbar-nav navbar-right">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo $_SESSION['picture'] ?>" width="30" height="30" style="border-radius:50%">
        <?php echo $_SESSION['givenName']." ".$_SESSION['familyName']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/MEDBED/profile.php">Profile</a>
          <a class="dropdown-item" href="/MEDBED/logout.php">Logout</a>
        </div>
    </li>
  </ul>
</nav>
    
<div class="container mt-3">
  <h1>Bed Availability</h1>
  <p>Enter location or use current location.</p> 
<div class="input-group mb-3 input-group-lg">
  <input type="text" class="form-control" id="autocomplete" onFocus="geolocate()" placeholder="Search..">
  <div class="input-group-append">
      <button class="btn btn-secondary" onclick="getLocation()" type="button"><i class="material-icons" >&#xE1B3;</i></button>
    <button class="btn btn-primary" onclick="showTable()" type="button">OK</button>
  </div>
</div>
    
    
<div id="map"></div>
<div id="displaytable" style="visibility: hidden" class="container cTable">

  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Beds</th>
        <th scope="col">Cost/day</th>
      </tr>
    </thead>
    <tbody id="addrow">
    </tbody>
  </table>
</div>
</div>

<p id="demo"></p>
    
  
      
      

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAZAD0dkk9aDVSIE3ZV0yT0j8HezLSizI&libraries=places&callback=initAutocomplete"
        async defer></script>
      
    
</body>
</html>