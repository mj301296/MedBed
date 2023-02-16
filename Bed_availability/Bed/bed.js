//AUTOCOMPLETE
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;
var map;
var service;
var infowindow;

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
       // clearTable(); 
        $('#autocomplete').on('click', ()=>{
   $('#addrow').empty()
})
        service.nearbySearch(request, callback);
        
      }

        function callback(results, status){
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
            console.log(results[i]);
        /*      if(searchHospital(results[i].place_id) == "yes")
                {
              createMarker(results[i]);
                }*/
                searchHospital(results,i);
            }
       
          }
      }

      function createMarkerYellow(place) {
        var placeLoc =place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location,
          icon: {
            url: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
           }
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
        
      function createMarkerRed(place) {
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
   
        
 function searchHospital(str,i) {
     str2 =str[i].place_id;
      if (str2.length == 0) { 
        alert("fail");
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           //  console.log(this.response);
            if (this.response == "0")
            {   
                createMarkerYellow(str[i]);
            }
            else{
               var tbRes= JSON.parse(this.response);
               showTable(tbRes.Sr_no,tbRes.Name,tbRes.Bed,tbRes.Cost);
              //  var obj = JSON.parse(this.response);
                console.log(tbRes.Name);
                console.log(tbRes.Bed);
                console.log(tbRes.Cost);
                createMarkerRed(str[i]);
            
            }
          }
        }
        xmlhttp.open("GET", "gethospital.php?q="+str2, true);
        xmlhttp.send();
        
      }
    }


   $(window).on('load',function(){
        $('#modalRegisterForm').modal({backdrop: "static"});
        $('#modalRegisterForm').modal('show');
        
    });

 /*   $('#checkRecord').on('click',function(email){
       if (email.length == 0) { 
    document.getElementsByName("fname").innerHTML = "no data found";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         var usRes= JSON.parse(this.response);
          console.log(this.response);
        document.getElementById("fname").innerHTML = urRes.Fname;
      }
    };
    xmlhttp.open("GET", "getuser.php?email=" + email, true);
    xmlhttp.send();  
  }
    });*/
function checkRecord(email){
    console.log(email);
    if (email.length == 0) { 
        alert("fail");
   // document.getElementsByName("fname").innerHTML = "no data found";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // var usRes= JSON.parse(this.response);
          console.log(this.response);
          if (this.response == "0")
            {
                
            }
          else{
              var usRes= JSON.parse(this.response);
              document.getElementById("fname").value = usRes.Fname;
              document.getElementById("lname").value = usRes.Lname;
              document.getElementById("contact").value = usRes.Contact;
          }
        
      }
    };
    xmlhttp.open("GET", "getuser.php?email=" + email, true);
    xmlhttp.send();  
  }
}
   

function insertUser(email, fname, lname, contact){
    console.log(email);
    if (email.length == 0) { 
        alert("fail");
   // document.getElementsByName("fname").innerHTML = "no data found";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // var usRes= JSON.parse(this.response);
          console.log(this.response);
          if (this.response == "Error")
            {
                alert("Error");
            }
          else{
         /*     var usRes= JSON.parse(this.response);
              document.getElementById("fname").innerHTML = urRes.Fname;
              document.getElementById("lname").innerHTML = urRes.Lname;
              document.getElementById("contact").innerHTML = urRes.Contact;*/
              $('#modalRegisterForm').modal("hide");
              
          }
        
      }
    };
    xmlhttp.open("GET", "insertuser.php?email=" + email +"&fname=" +fname +"&lname=" +lname +"&contact=" +contact , true);
    xmlhttp.send();  
  }
}
    
    
    
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
    
function showTable(sr_no, name, bed, cost)
{   //var address =document.getElementById("autocomplete").value;
    document.getElementById("displaytable").style.visibility = 'visible';
    var table = document.getElementById("addrow");
    var row = table.insertRow(-1);
    row.scope ="row";
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    console.log(name);
    console.log(bed);
    console.log(cost);
    cell1.innerHTML = name;
    cell2.innerHTML = bed;
    cell3.innerHTML = cost;
    //geocode(autocomplete);
}

