<?php
  require '../include/common.inc.php';
  include ROOT.'/include/init.inc.php';
  require ROOT.'/classes/modelmgr/PosterXmlModel.cls.php';
  $action=$_REQUEST["action"];
  $model=new PosterXmlModel("poster.php");
	$smarty->assign("MyModule","poster");
  $model->DefaultShow($smarty,$dbmgr,$action,"poster",$_REQUEST);
?>