<?php
/**
 * The template used for displaying widget content in home-page.php
 *
 * @package Superhero
 * @since Superhero 1.0
 */
?>
<div class="row">
  
  <div class="col-lg-12" style="margin-bottom: 20px; text-align:center;font-size: initial;">
    <h2>CITY GUIDES</h2>
    BLACKBOOK'S CURATED GUIDE TO
    EATS, DRINKS, SLEEPS, AND MORE
  </div>
</div>

<div id="guides" class="col-lg-12" style=" margin-bottom: 20px;">
	
	<div class="form-group col-lg-3" style="background: #fff; padding: 0 5px;">
	    <select class="form-control" id="edition">
		      <option value="" selected="selected">Select Your Edition</option>
		      <option value="new-york">New York</option>
		      <option value="los-angeles">Los Angeles</option>
		      <option value="chicago">Chicago</option>
		      <option value="las-vegas">Las Vegas</option>
		      <option value="san-francisco">San Francisco</option>
		      <option value="miami">Miami</option>
		</select>
	</div>
	
	<div class="form-group col-lg-3" id="citySelect" style="background: #fff; padding: 0 5px;">
		<select style="width: 100%;" class="form-control" id="city">
		      <option value="" selected="selected">City</option>
		      <option id="new york" value="new-york/">New York</option>
		      <option id="los angeles" value="los-angeles/">Los Angeles</option>
		      <option id="chicago" value="chicago/">Chicago</option>
		      <option id="las vegas" value="las-vegas/">Las Vegas</option>
		      <option id="san francisco" value="san-francisco/">San Francisco</option>
		      <option id="miami" value="miami/">Miami</option>
		</select>
	</div>
	
	<div class="form-group col-lg-2" id="areaSelect" style="background: #fff; padding: 0 5px;">
		<select  class="form-control" id="locality">
		  <option value="" selected="selected">Location</option>
		  <option value="Brooklyn/">Brooklyn</option>
		</select>
	</div>
	
	<div  class="form-group col-lg-2" id="typeSelect" style="background: #fff;  padding: 0 5px;">
		<select class="form-control" id="type">
		  	  <option value="" selected="selected">Type</option>
		  	  <option value="Restaurant">Restaurants</option>
		      <option value="Health-beauty">Health-Beauty</option>
		      <option value="Nightlife">Nightlife</option>
		      <option value="Shopping">Shopping</option>
		      <option value="Hotels">Hotels</option>
		</select>
	</div>
	
  	<div class="form-group col-lg-2" id="goButton" style="background: #fff;  padding: 0 5px;">
		<input class="btn" type="submit" name="button" id="go_button" style="background: #fff; height: 34px; width: 100%;" value="Go!" onclick="createUrl();">
	</div>
	
</div>

<div class="blackbox col-lg-12" style="margin-bottom: 10px">
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
   <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
  <div class="col-xs-6 col-lg-3">
    <a href="./blacklists/Films">Films Playing In The Theater Now!</a>
    </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj0olaagk-BV0u5-1GCPV3ALOW4nHeGDA&sensor=true">
</script>
<script>
$(document).ready(function() {

  //I'm not doing anything else, so just leave
  if(!navigator.geolocation) return;
  
  navigator.geolocation.getCurrentPosition(function(pos) {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        //Check result 0
        var result = results[0];
        //look for locality tag and administrative_area_level_1
        var city = "";
        var state = "";
        for(var i=0, len=result.address_components.length; i<len; i++) {
          var ac = result.address_components[i];
          if(ac.types.indexOf("locality") >= 0) city = ac.long_name;
        }
        //only report if we got Good Stuff
        if(city != '') {
          var selectobject=document.getElementById('city')
            for (var i=0; i<selectobject.length; i++){
              if (selectobject.options[i].text.toLowerCase() == city.toLowerCase()) {
                 document.getElementById(selectobject.options[i].value).selected = true;
          }else{document.getElementById("new york").selected = true;};
        }
        }
      } 
    });
  
  });

})
</script>  

<script src="<?php echo esc_url( get_template_directory_uri() . '/inc/js/bootstrap.min.js' ); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
      function createUrl() {
    location.href = "guides/" + document.getElementById("city").value + document.getElementById("locality").value + document.getElementById("type").value;
}

</script>