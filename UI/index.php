<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>�򵥵�ͼ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
p{
    width:603px;
    padding-top:3px;
    overflow:hidden;
}
.btn{
    width:142px;
}
#container{
    min-width:600px;
    min-height:767px;
}
</style>
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
<script>

window.onload = function(){

//ֱ�Ӽ��ص�ͼ


    //��ʼ����ͼ����  �Զ��庯����init
    function init() {
        //����map���� ���� qq.maps.Map() ���캯��   ��ȡ��ͼ��ʾ����
         var map = new qq.maps.Map(document.getElementById("container"), {
            center: new qq.maps.LatLng(39.916527,116.397128),      // ��ͼ�����ĵ������ꡣ
            zoom:8                                                 // ��ͼ�����ĵ������ꡣ
        });
    }

    //���ó�ʼ��������ͼ
    init();


}
</script>
</head>
<body>
<!--   �����ͼ��ʾ����   -->
<div id="container"></div>
</body>
</html>