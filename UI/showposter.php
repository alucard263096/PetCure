<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  
  $poster=$posterMgr->getPoster($_REQUEST["id"]+0);
  $smarty->assign("poster",$poster);
  
  $record=$posterMgr->getPosterRecord($_REQUEST["id"]+0);
  $smarty->assign("record",$record);
  
  $smarty->assign("verify",md5(time().$file["name"]));

  if($_REQUEST["mode"]=="full"){

	  include ROOT.'/classes/mgr/wechat.cls.php';
	  $signPackage = $WechatMgr->GetSignPackage();
	  $smarty->assign("wechatsign",$signPackage);
	  $smarty->display(ROOT.'/templates/fullshowposter.html');

  }else{
	$smarty->display(ROOT.'/templates/showposter.html');
  }

  
?>