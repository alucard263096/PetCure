<?php

  require 'include/common.inc.php';
$agent=strtolower($_SERVER["HTTP_USER_AGENT"]);

if(strstr($agent,"micromessenger")){
	if(strstr($agent,"iphone")||strstr($agent,"mac")||strstr($agent,"ipad")){
		WindowRedirect($CONFIG['URL']."/index.php");
	}else{
		WindowRedirect($CONFIG['URL']."/index.php");
	}
}else{
	
}

if(strstr($agent,"iphone")||strstr($agent,"mac")||strstr($agent,"ipad")){
		WindowRedirect($CONFIG['URL']."/index.php");
}else{
	if(strstr($agent,"micromessenger")){
		echo "请复制以下网址到手机浏览器中打开<br /><br />http://www.myhkdoc.com/PetCureApp/PetCure.apk";
	}else{
		WindowRedirect("http://www.myhkdoc.com/PetCureApp/PetCure.apk");
	}
}


?>