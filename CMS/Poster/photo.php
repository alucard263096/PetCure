<?php
  require '../include/common.inc.php';
  include ROOT.'/include/init.inc.php';
  $action=$_REQUEST["action"];
  $model=new XmlModel("photo","photo.php");
	$smarty->assign("MyModule","poster");
  $model->DefaultShow($smarty,$dbmgr,$action,"photo",$_REQUEST);
?>