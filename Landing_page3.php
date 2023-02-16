<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: Bed_availability/places.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>


<!DOCTYPE html>

<html lang="en">
    
  <head>
      
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="Landing_page/main.css">
  </head>
  <title>
LANDING PAGE    
  </title>
    
    

    
  <body>
            
    
      
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <ul class="navbar-nav">
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
</nav>
   
<div class="jumbotron jumbotron-fluid">
  <div class="container land-text">
    <h1>Welcome to MedBed.</h1>      
    <p>We Always Care Your Health.</p>
   <!-- <a class="btn btn-info" href="Bed_availability/places.php">Learn more</a>-->
    <a class="btn btn-info" onclick="window.location = '<?php echo $loginURL ?>';">Log In With Google</a>
  </div>
</div>
      

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h1 class="text-center">LOGIN</h1>
            <label class="label control-label">E-mail</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="mail" placeholder="">
        
        </div>
        <label class="label control-label">Password</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="Password" class="form-control" name="Password" placeholder="">
        </div>
        <!-- make a row for col-md-6 -->
        <div class="row">
             <div class="col-md-6">
                <input type="checkbox"> <small>Remember me</small>
             </div>
             <div class="col-md-6">
                <a href="#"><p class="text-right">Forget Password</p></a>
             </div>
        </div>
        <!-- close -->
        <div class="btn btn-dark btn-block">LOGIN</div>
        <p class="text-center">Not a member yet? <a href="#"> Sign Up</a></p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <h2 class="text-center">Sign up</h2>
            <label class="label control-label">Name</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="Name" placeholder="">
        </div>
        <label class="label control-label">E-mail</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="email" class="form-control" name="mail" placeholder="">
        </div>
        <label class="label control-label">Contact</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                <input type="text" class="form-control" name="contact" placeholder="">
        </div>
        <label class="label control-label">Password</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" name="password" placeholder="">
        </div>
        <label class="label control-label">Re-type Password</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" name="re-type password" placeholder="">
        </div>
        <div class="btn btn-dark btn-block">SIGN UP</div>
    </div>
</div>
</div>
      
      
  </body>
    
</html>
