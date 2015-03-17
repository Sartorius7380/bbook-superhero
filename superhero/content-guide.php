<?php
/**
 * The template used for displaying page content in guide.php
 *
 * @package Superhero
 * @since Superhero 1.0
 */
?>
<?php
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
$tokens = explode('/', $current_url);
$locality = $tokens[sizeof($tokens)-2];
$venue = $tokens[sizeof($tokens)-1];
?>
<div class="title">
  <h2 id="locality"><?php echo $locality ?> </h2>
  <h4 id="venue"><?php echo $venue ?> </h4>
</div>
<div class="row">
	<div class="col-sm-12 col-lg-8" id="map-container" style="height:300px">
		<div id="map-canvas"></div>
	</div>
	<div class="col-sm-12 col-lg-4" style="background: #000; color: #fff;">This is a placeholder for the BlackBook Top 5 Restaurants</div>
</div>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
  var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 8,
      draggable: false,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var address = '<?php echo "$locality"; ?>';
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }

/*var map;
var infowindow;

function initialize() {
  var nyc = new google.maps.LatLng(40.758224, -73.917404);

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: nyc,
    zoom: 13
  });

  var request = {
    location: nyc,
    radius: 1500,
    types: ['restaurant']
  };
  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
}

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
*/
google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    

