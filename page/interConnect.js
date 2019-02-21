document.write("<script src='loadInventory.php'><"+"/script>");
document.write("<script src='loadMapinfo.php'><"+"/script>");
document.write("<script src='ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'><"+"/script>");

/*
var name //회원이름
var items //회원이 가지고있는 아이템 목록들
var itemsAmount // 회원이 가지고있는 아이템 양들
*/

/*
var mapItemInfo.name //아이템 이름
var mapItemInfo.latitude //위도
var mapitemInfo.longtitude //경도
*/

/*
var marker[]
var markLocation[]
*/


//-----------Searching Item ------------//
function searchItem(){
    navigator.geolocation.getCurrentPosition(searching);
    function searching(position){
        var cur_latitude = position.latitude;
        var cur_longtitude = position.longtitude;
        //--------Get Item from map ---------------// 
        for(var i=0; i<marker.length; i++){
            if(marker[i].getMap() != null){
                var distance = Math.sqrt(Math.pow(markLocation[i].latitude - cur_latitude,2) + Math.pow(markLocation[i].longtitude - cur_longtitude,2));
                if(distance <= 50){ //If distance is over 50, add marker
                    marker.setMap(null);
                    var img = document.createElement('img');
                    img.src = 'items/'+ mapIteminfo[i].code +'.jpg';
                    inventory[inventory.length].appendChild(img);
                    //Ajax를 이용한 DB에서 목록 삭제
                    $.ajax({
                        url:'searchingAJAX.php',
                        type: 'post',
                        data: {'number':marker[i].number},
                        success : function(){
                            //alert("아이템 획득");
                        }
                    });
                } 
            }
        }

    }
}
document.getElementById("GetItemBtn").addEventListener("click", searchItem());


//----------- Save Info ----------//
function saveInfo(){
    $.ajax({
        url:'saveAJAX.php',
        type: 'post',
        data: {'name':name, 'items':items, 'itemsAmount':itemsAmount},
        success : function(){
            //alert("정보 저장");
        }
    });
}



