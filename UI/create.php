<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';

  $smarty->assign("subform","Y");
  
  $needstips="流浪的小可爱需要什么...";
  if($_REQUEST["type"]=="1"){
	$needstips="我现在最需要的帮助是...";
  }
  
  $smarty->assign("needstips",$needstips);
  
  $smarty->display(ROOT.'/templates/create.html');
  
?>