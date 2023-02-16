<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    
   <style type="text/css">

        
       .jumbotron{
           background-image:url(Landing_page/care.png);
           background-position: center;
           background-size: cover;
           background-repeat: no-repeat;
           color: white;
           height: 600px;
           
			 
       }
       .color-white{
           color: white;   
       }
       	body{
			  background-color:#FFFFFF;
			 

			 
       }
       
      

       .land_text{
        padding-top:15%;
     
       }
       
       
    </style>
    
  <body >
            
    
      
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
  <div class="container land_text">
    <h1>Welcome to MedBed.</h1>      
    <p>We Always Care Your Health.</p>
    <button class="btn btn-info" data-toggle="modal" data-target="modalRegisterForm">Learn more</a>
  </div>
</div>
      

<div id="modalRegisterForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
            </div>
            <div class="modal-body">
 
                <form role="form" onsubmit="insert(email,fname,lname,contact)">
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg validate" name="email">
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
                        
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      
     

</body>
</html>
