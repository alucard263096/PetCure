<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->getFollowList($_REQUEST["member_id"],$_REQUEST["page"],$_REQUEST["count"]);
  outputXml($result);
?>