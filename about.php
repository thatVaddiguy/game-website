<?php
  include ('common.php');
  outputHeader('About');
  outputNavbar('About');
?>

<!--Loads the different containers for the about page  -->
<div class="container-fluid text-center aboutContainer" id="bg-1">
  <h2>Who Am I?</h2>
  <img src="images/me.jpg" alt="Me" class="img-circle" width="250" height="250">
  <p>
    I'm an aspiring Web and Mobile app Developer
  </p>
</div>
<div class="container-fluid text-center aboutContainer" id="bg-2">
  <h2>What Am I?</h2>
  <p>
    Hey! did you ever have an idea but did not know how to develop a mobile app or
    a website for it ? Well you just found your answer.
  </p>
</div>
<div class="container-fluid text-center aboutContainer" id="bg-3">
  <h2>Where to find me?</h2>
  <!--Loads the social media icons and the links -->
  <div>
      <a href="https://twitter.com/TheVadster7" target="_blank" class="fa fa-twitter" data-toggle="tooltip" title="Twitter" data-placement="bottom"></a>
      <a href="https://www.linkedin.com/in/rohit-vaddi-141096/" target="_blank" class="fa fa-linkedin" data-toggle="tooltip" title="Linkedin" data-placement="bottom"></a>
      <a href="mailto:rohitvaddi96@gmail.com?Subject=Nice%Website" target="_blank" class="fa fa-envelope" data-toggle="tooltip" title="Mail" data-placement="bottom"></a>
      <a href="https://github.com/thatVaddiguy" class="fa fa-github" target="_blank" data-toggle="tooltip" title="Github" data-placement="bottom"></a>
      <a href="https://500px.com/rohitvaddi" class="fa fa-500px" target="_blank" data-toggle="tooltip" title="500px" data-placement="bottom"></a>
      <a href="https://www.instagram.com/thevadster7/" target="_blank" class="fa fa-instagram" data-toggle="tooltip" title="Instagram" data-placement="bottom"></a>
      <a href="https://youtu.be/_D0ZQPqeJkk" target="_blank" class="fa fa-resistance" data-toggle="tooltip" title="Click me!" data-placement="bottom"></a>
  </div>
  <!--Makes the container for the map -->
  <div id="map">The map shall be placed here</div>
</div>
<script>
  //function to load the map and sets the center of the map and the markers on them
  function myMap(){
    var mapCanvas = document.getElementById('map');
    var myCenter = new google.maps.LatLng(24.495515,54.3752533);
    var mapOptions = {
      center: myCenter,
      zoom: 15
    };
    var map = new google.maps.Map(mapCanvas,mapOptions);
    var infowindow = new google.maps.InfoWindow({
      content:"Come Visit My Office Here"
    })
    var marker = new google.maps.Marker({
      position:myCenter,
      map:map,
      title: 'Office'
    });
    //sets a listener for a click on the marker
    marker.addListener('click',function(){
      infowindow.open(map,marker);
      marker.setAnimation(google.maps.Animation.BOUNCE)
    });
    marker.setMap(map);
  }
  //toggles the tooltip on click of the social media links
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  })
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlAWHaJYLQG9A0v9ccilhh18bAOllaZU&callback=myMap"></script>

<?php
  outputFooter();
?>
