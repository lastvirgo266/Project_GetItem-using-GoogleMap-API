<?php
include_once "itemDB.php";


isset($_SESSION['userid']);
$id = $_SESSION['userid'];
 
//------------- Search Item information(DB조회) ---------------//
/*
$sql = mq("SELECT * FROM items");
$desc = [];
// look through query
while($row = $sql->fetch_row()){ //fectch_array 에서 고장났음
  // add each row returned into an array
  //array_push($code,$row[0]); //Save Item code
  array_push($desc[$row[0]], $row[1]); //Save Descript
}
*/

  //------------Load map Items ------------//
  $sql = mq("SELECT * FROM mapItem");
  $mapItemInfo = [];

  
  // look through query
  $i = 0;
  while($row = mysqli_fetch_row($sql)){ //fectch_array 에서 고장났음
    $mapItemInfo[$i]->number = $row[0];
    $mapItemInfo[$i]->code = $row[1];
    $mapItemInfo[$i]->latitude = $row[2];
    $mapItemInfo[$i]->longtitude = $row[3];
    $i = $i+1;
  }

  ?>



<script>
//Google Map API
//document.write("<script type='text/javascript' src='map.js'><"+"/script>");
document.write("<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDuEOzbLWaXL7OzKZw_F4NueSezjfbjDxs&callback=initMap'><"+"/script>");
var mapItemInfo = <?php echo json_encode($mapItemInfo) ?>;
var markLocation =[];
var marker = [];

//-----------------Get Map ----------------//
navigator.geolocation.getCurrentPosition(
    (function initialize(position)
{
  //Get Current latitude, longtitude
    var lat = position.coords.latitude; //Current latitude
    var lon = position.coords.longitude; //Current longtitude

//Set MapProp
var mapProp = {
  center: new google.maps.LatLng(lat, lon),
  zoom:16,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  
};

//Set map id == googleMap
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);


//-------------------Making Marekr from mapItem---------------//
for(var i=0; i<mapItemInfo.length; i++){
  markLocation[i] = new google.maps.LatLng(mapItemInfo[i].latitude, mapItemInfo[i].longtitude); // 마커가 위치할 위도와 경도
  // alert(mapItemInfo[i].latitude); // TEST
  marker[i] = new google.maps.Marker({
    position: markLocation,
    title: 'Hello World!',
    map : map
  });

  var content = "아이템"; // 말풍선 안에 들어갈 내용

  //Marker Click Event
  var infowindow = new google.maps.InfoWindow({content: content});
  
  google.maps.event.addListener(marker[i], "click", function() {
  infowindow.open(map,marker[i]);
  });
}

}),

(function errorCallback(error){
    alert(error.message);
}));


google.maps.event.addDomListener(window, 'load', initialize);


</script>


