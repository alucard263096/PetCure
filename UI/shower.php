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
  
  include ROOT.'/classes/mgr/wechat.cls.php';
  $signPackage = $WechatMgr->GetSignPackage();
  
  $poster_id=$_REQUEST["poster_id"];
  $photos=$posterMgr->getPosterPhoto($poster_id);

  
  $smarty->assign("wechatsign",$signPackage);
  $smarty->assign("photos",$photos);
  $smarty->display(ROOT.'/templates/shower.html');
?>