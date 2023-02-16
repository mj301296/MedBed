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
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 40%;
        width:  40%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
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
</style>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>      

      
      
      
    <script>
//AUTOCOMPLETE
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['geometry']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
         else{
             console.log(place.geometry.location.lat());
           initMap(place.geometry.location);  
             
         }

          /* If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);*/

//geocode(val);
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
        
        
//GEOCODE
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var service;
      var infowindow;
     // var latlng = {lat: parseFloat("0"), lng: parseFloat("0")};
        
    
      //geocode();
      function geocode(x){
        //var location ='Chafekar Bandu Marg';
          axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
              params:{
                  address:x,
                  key:'AIzaSyDAZAD0dkk9aDVSIE3ZV0yT0j8HezLSizI'
              }
          })
        .then(function(response){
       /*  latlng= {lat: response.data.results[0].geometry.location.lat, 
           lng: response.data.results[0].geometry.location.lng}; */
       // initMap(response.data.results[0].geometry.location);
              
              console.log(response);
              })
        .catch(function(error){
            console.log(error);
          });
      }  
      

      function initMap(x) {
        var s_center = new google.maps.LatLng(x.lat(),x.lng());

        infowindow = new google.maps.InfoWindow();

        map = new google.maps.Map(
            document.getElementById('map'), {center: s_center, zoom: 15});

        var request = {
           location: s_center,
           radius: 5000,
           type: ['hospital']
        };
          
        service = new google.maps.places.PlacesService(map);
          
        service.nearbySearch(request, callback);
      }

        function callback(results, status){
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarker(results[i]);
            }
       
          }
      }

      function createMarker(place) {
        var placeLoc =place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
   
    </script>
    
<body>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modalRegisterForm').modal({backdrop: "static"});
        $('#modalRegisterForm').modal('show');
        
    });
</script>
    
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
{   //var address =document.getElementById("autocomplete").value;
    document.getElementById("displaytable").style.visibility = 'visible';
    //geocode(autocomplete);
}


</script>

    
      
      

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAZAD0dkk9aDVSIE3ZV0yT0j8HezLSizI&libraries=places&callback=initAutocomplete"
        async defer></script>
      
    
</body>
</html>