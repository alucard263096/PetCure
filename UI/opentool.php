<?php

  require 'include/common.inc.php';
$agent=strtolower($_SERVER["HTTP_USER_AGENT"]);

if(strstr($agent,"iphone")||strstr($agent,"mac")||strstr($agent,"ipad")){
		WindowRedirect($CONFIG['URL']."/index.php");
}else{
	if(strstr($agent,"micromessenger")){
		WindowRedirect("http://a.app.qq.com/o/simple.jsp?pkgname=com.helpfooter.steve.petcure");
	}else{
		WindowRedirect("http://www.myhkdoc.com/PetCureApp/PetCure.apk");
	}
}


?>