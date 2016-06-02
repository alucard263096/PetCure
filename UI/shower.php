<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';

  if($_REQUEST["check"]!=""){
	include ROOT.'/include/member.inc.php';
  }

  $smarty->assign("nodefault","Y");
  $smarty->assign("subform","Y");
  
  $smarty->display(ROOT.'/templates/shower.html');
?>