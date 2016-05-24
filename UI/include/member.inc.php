<?php


  $member=$_SESSION[SESSIONNAME]["member"];
  if($member==null||$member["id"]==""){
	$_SESSION[SESSIONNAME]["url_request"]="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	//echo "red ".$CONFIG['URL']."/login.php";
	WindowRedirect($CONFIG['URL']."/login.php");
  }
  
?>