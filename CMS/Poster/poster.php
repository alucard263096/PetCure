<?php
  require '../include/common.inc.php';
  include ROOT.'/include/init.inc.php';
  $action=$_REQUEST["action"];
  $model=new XmlModel("poster","poster.php");
	$smarty->assign("MyModule","poster");
  $model->DefaultShow($smarty,$dbmgr,$action,"poster",$_REQUEST);
?>