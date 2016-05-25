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
		WindowRedirect("应用宝");
	}else{
		WindowRedirect("http://www.myhkdoc.com/PetCureApp/PetCure.apk");
	}
}


?>