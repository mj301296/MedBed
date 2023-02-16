<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
    
<style type="text/css">
        body{
            background-color: #D6F1FF;
            background-image: url("/Users/mrugankjadhav/Desktop/MEDBED/Bed_availability/bed_back.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat; 
        } 
    
        .cTable{
          background-color: aliceblue;  
          width:auto;
          padding-left:30px; 
          padding-top: 20px;
          font-weight: bold;
          margin-top: 20px;
          margin-bottom: 20px;
          padding: 50px;
          border-radius: 10px;
          box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
          color: black;
          height: auto;
            
        
       }
    
    .mt-3{
        padding: 50px 30px 10px;;
       }
    .wcolor{
        color: dimgrey;
    }
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>
    
    
<body>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modalRegisterForm').modal({backdrop: "static"});
        $('#modalRegisterForm').modal('show');
        
    });
</script>
 
    
<form class="border border-light p-5">

    <p class="h4 mb-4 text-center">Sign in</p>

    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-between">
        <div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <a href="">Forgot password?</a>
        </div>
    </div>

    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <div class="text-center">
        <p>Not a member?
            <a href="">Register</a>
        </p>

        <p>or sign in with:</p>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-twitter"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-github"></i>
        </a>
    </div>
</form>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
      </div>
      <div class="modal-body mx-3">

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" class="form-control validate" placeholder="Email">
        </div>
          
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate" placeholder="First Name">
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate"placeholder="Last Name">
        </div>
          
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="" id="orangeForm-pass" class="form-control validate"placeholder="Contact">
        </div>
          
          

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success " class="close" data-dismiss="modal">Sign up</button>
      </div>
    </div>
  </div>
</div>



<div class="jumbotron mt-3">
  <h1>Bed Availability</h1>
  <p>Enter location or use current location.</p> 
<div class="input-group mb-3 input-group-lg">
  <input type="text" class="form-control" placeholder="Search..">
  <div class="input-group-append">
      <button class="btn btn-secondary" onclick="getLocation()" type="button"><i class="material-icons" >&#xE1B3;</i></button>
    <button class="btn btn-primary" onclick="showTable()" type="button">OK</button>
  </div>
</div>
    
    

<div id="displaytable" style="visibility: hidden" class="container cTable">
  <table class="table table-hover table-bordered table-responsive-lg">
    <thead class="thead-light">
      <tr>
        <th>Name</th>
        <th>Beds</th>
        <th>Cost/day</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>abc</td>
        <td>10</td>
        <td>5000</td>
      </tr>
      <tr>
        <td>efg</td>
        <td>20</td>
        <td>2000</td>
      </tr>
      <tr>
        <td>hij</td>
        <td>10</td>
        <td>7000</td>
      </tr>
    </tbody>
  </table>
</div>


<p id="demo"></p>
    

    
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
    
function showTable()
{
    document.getElementById("displaytable").style.visibility = 'visible'; 
}

$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
    

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAZAD0dkk9aDVSIE3ZV0yT0j8HezLSizI&libraries=places&callback=initMap" async defer></script>

    
</body>
</html>

