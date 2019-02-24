<?php
include_once "loadInventory.php";
include_once "loadMapinfo.php";

//----------- Save Info ----------//
function saveInfo(){
    // $.ajax({
    //     url:'saveAJAX.php',
    //     type: 'post',
    //     data: {'name':name, 'items':items, 'itemsAmount':itemsAmount},
    //     success : function(){
    //         //alert("정보 저장");
    //     }
    // });

    $member_info = $id.".txt";
    $fp = fopen("../member/member_info/$member_info","w"); // @fopen도 가능 여기서 @는 오류가 나도 그냥 무시하고 진행한다는 의미
    if(!$fp) {
        echo 'Could not processed!</body></html>';
        exit;
    }

    //Save name
    fwrite($fp,$name."\n");

    //Save item code
    for($i =0; $i<count($items); $i++){
    if($itemsAmount[$i] !== '0'){
      fwrite($fp,$items[$i]." ");
    }
    }

    fwrite($fp,"\n");

    //Save itmeAmount code
    for($i =0; $i<count($itemsAmount); $i++){
        if($itemsAmount[$i] !== '0'){
         fwrite($fp,$itemsAmount[$i]." ");
     }
    }
    fclose($fp);


}


//echo '"<script>document.getElementById("GetlgoutBtn").addEventListener("click", saveInfo);</scirpt>"';

?>


<script>
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
document.write("<script src='ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'><"+"/script>");

document.getElementById("GetItemBtn").addEventListener("click", searchItem);

function searchItem(){
    navigator.geolocation.getCurrentPosition(searching);
    function searching(position){
        var cur_latitude = position.latitude;
        var cur_longtitude = position.longtitude;
        //--------Get Item from map ---------------// 
        for(var i=0; i<marker.length; i++){
            if(marker[i].getMap() != null){
                var distance = Math.sqrt(Math.pow(markLocation[i].latitude - cur_latitude,2) + Math.pow(markLocation[i].longtitude - cur_longtitude,2));
                if(distance <= 99999){ //If distance is over 50, add marker
                    marker[i].setMap(null);
                    var img = document.createElement('img');
                    img.src = 'items/'+ mapIteminfo[i].code +'.jpg';
                    inventory[inventory.length].appendChild(img);
                    
                    alert(marker[i].number); //TEST
                    <?= mq("DELETE FROM mapItem WHERE number=$number");?> //Ajax 사용안하려고 쓴건데 될지 안될지는 머르겠따!

                    // //Ajax를 이용한 DB에서 목록 삭제
                    // $.ajax({
                    //     url:'searchingAJAX.php',
                    //     type: 'post',
                    //     data: {'number':marker[i].number},
                    //     success : function(){
                    //         //alert("아이템 획득");
                    //     }
                    // });
                } 
            }
        }

    }
}

function js_saveInfo(){
    <?= saveInfo();?> //Ajax 사용안하려고 쓴건데 될지 안될지는 머르겠따!
}

document.getElementById("GetlgoutBtn").addEventListener("click", js_saveInfo);


</script>

