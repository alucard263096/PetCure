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
  
  $list=$posterMgr->getPosterList($_REQUEST["lat"]+0,$_REQUEST["lng"]+0);
  $arr=array();
  $arr["val"]=$list;
  //print_r($list);
  echo json_encode($arr);
  
  //$smarty->display(ROOT.'/templates/poster.html');
  
?>