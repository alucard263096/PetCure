<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';
  
  include ROOT.'/classes/mgr/wechat.cls.php';
  $info = $WechatMgr->getUserBaseInfo("alucard263096");

  echo $info;
  print_r($info);
?>