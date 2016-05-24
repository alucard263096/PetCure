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



?>