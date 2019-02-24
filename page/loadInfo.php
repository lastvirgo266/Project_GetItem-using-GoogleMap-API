<?php
include_once "loadInventory.php";
include_once "loadMapinfo.php";

?>


<script>
//--------------------Making Item Inventory--------------------------------------//
//var dsec = <?= json_encode($dsec) ?>; //DB로부터 가져온 Item desc
var name = '<?= $name?>'; //이름
var items = <?= json_encode($items) ?>; //회원이 가지고있는 아이템 목록들
var itemsAmount = <?= json_encode($itemsAmount) ?>;// 회원이 가지고있는 아이템 양들


var inventory = document.getElementsByClassName('item');
//Change background color
for(var i=0; i<inventory.length; i++){
    var img = document.createElement('img');
    if(items[i]) img.src = 'items/'+ items[i] +'.jpg';
    inventory[i].appendChild(img);
    //item[i].style.backgroundColor = 'cyan'; //
    //imem[i].src;
}





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