<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';

  $ddltype=array();
  $ddltype[0]["val"]="0";
  $ddltype[0]["name"]="全部救助";
  $ddltype[1]["val"]="1";
  $ddltype[1]["name"]="只显示待救助";
  $ddltype[2]["val"]="2";
  $ddltype[2]["name"]="只显示求助";
  $smarty->assign("ddltype",$ddltype);


  $ddlorder=array();
  $ddlorder[0]["val"]="0";
  $ddlorder[0]["name"]="离我最近";
  $ddlorder[1]["val"]="1";
  $ddlorder[1]["name"]="最新发布";
  $ddlorder[2]["val"]="2";
  $ddlorder[2]["name"]="发布最久";
  $ddlorder[3]["val"]="3";
  $ddlorder[3]["name"]="最多收藏";
  $ddlorder[4]["val"]="4";
  $ddlorder[4]["name"]="最多关注";
  $smarty->assign("ddlorder",$ddlorder);

  $smarty->assign("action","list");
  $smarty->assign("located","Y");
  $smarty->display(ROOT.'/templates/posterlist.html');

?>