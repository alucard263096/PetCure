<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/member.inc.php';
  include ROOT.'/include/init.inc.php';

  include ROOT.'/classes/mgr/'.$CONFIG['database']['provider'].'.cls.php';
  include ROOT.'/classes/datamgr/member.cls.php';

  $created_member=$memberMgr->getPosterCreatedMemberId($_REQUEST["poster_id"]);
  if($created_member!=$member["id"]){
	WindowRedirect($CONFIG['URL']."/index.php");
  }
  $smarty->assign("subform","Y");
  
  $smarty->display(ROOT.'/templates/hint.html');
?>