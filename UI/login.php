<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';

  $submit=$_REQUEST["submit"];
  if($submit=="login"){
	include ROOT.'/classes/mgr/'.$CONFIG['database']['provider'].'.cls.php';
	include ROOT.'/classes/datamgr/member.cls.php';
	$member=$memberMgr->loginReg($_REQUEST["mobile"],md5($_REQUEST["password"]));
	if($member["id"]>0){
		$_SESSION[SESSIONNAME]["member"]=$member;
		echo "SUCCESS";
	}else{
		echo $member;
	}
		exit;
  }else{
	$smarty->display(ROOT.'/templates/login.html');
  }
?>