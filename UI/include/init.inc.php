<?php


 $smarty->assign('MapKey',$CONFIG['Tencent']["MapKey"]);

 
  $member=$_SESSION[SESSIONNAME]["member"];
  if($member!=null&&$member["id"]!=""){

  

	if(isset($_SESSION[SESSIONNAME]["url_request"]))
	{
		$url_request=$_SESSION[SESSIONNAME]["url_request"];
		unset($_SESSION[SESSIONNAME]["url_request"]);
		WindowRedirect($url_request);
	}

	$smarty->assign("member",$member);
  }

  
 $thisurl=$_SESSION[SESSIONNAME]["thisurl"];
 $lasturl=$_SESSION[SESSIONNAME]["lasturl"];

 if($thisurl==""){
	$_SESSION[SESSIONNAME]["thisurl"]=$_REQUEST["REQUEST_URI"];
	$thisurl=$_REQUEST["REQUEST_URI"];
 }
 if($lasturl==""){
	$_SESSION[SESSIONNAME]["lasturl"]=$CONFIG['URL']."/index.php";
	$lasturl=$CONFIG['URL']."/index.php";
 }
 
 $_SESSION[SESSIONNAME]["lasturl"]=$thisurl;
 $_SESSION[SESSIONNAME]["thisurl"]=$_REQUEST["REQUEST_URI"];

 
 $thisurl=$_SESSION[SESSIONNAME]["thisurl"];
 $lasturl=$_SESSION[SESSIONNAME]["lasturl"];

 if($thisurl==$lasturl){
	$_SESSION[SESSIONNAME]["lasturl"]=$CONFIG['URL']."/index.php";
	$lasturl=$CONFIG['URL']."/index.php";
 }

 $smarty->assign("thisurl",$thisurl);
 $smarty->assign("lasturl",$lasturl);
 

?>