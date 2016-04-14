<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>宠物救助站</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style type="text/css">
        html,body{
            width:100%;
            height:100%;
        }
        *{
            margin:0px;
            padding:0px;
        }
        body, button, input, select, textarea {
            font: 12px/16px Verdana, Helvetica, Arial, sans-serif;
        }
        #container{
            min-width:100%;
            min-height:100%;
        }
    </style>
</head>
<body>
    <!--   定义地图显示容器   -->
    <div id="container"></div>
    <iframe id="geoPage" width=0 height=0 frameborder=0 style="display:none;" scrolling="no" src="http://apis.map.qq.com/tools/geolocation?key=EBWBZ-CZN3K-4O5JK-A3WQF-5HOCS-HUB2O&referer=myapp"></iframe>



    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=EBWBZ-CZN3K-4O5JK-A3WQF-5HOCS-HUB2O"></script>
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
    <script>
	var map;
	$(document).ready(function(){
	initMap();
	locateUser();
	});
	function initMap(){
		map = new qq.maps.Map(document.getElementById("container"), {
            center: new qq.maps.LatLng(22.543670,114.059640),      // 地图的中心地理坐标。
            zoom:13                                                // 地图的中心地理坐标。
        });
	}
	function locateUser(){
		window.addEventListener('message', function(event) {
		// 接收位置信息
		var loc = event.data;
			if(loc  && loc.module == 'geolocation') { //定位成功,防止其他应用也会向该页面post信息，需判断module是否为'geolocation'
                var center = new qq.maps.LatLng(loc.lat, loc.lng);

                map.setCenter(center);
				var marker = new qq.maps.Marker({
					//设置Marker的位置坐标
					position: center,
					//设置显示Marker的地图
					map: map
				});
				marker.setTitle("我的位置");
            } else { //定位组件在定位失败后，也会触发message, event.data为null
                alert('定位失败');
            }
		}, false);
	}
    </script>
</body>


</html>