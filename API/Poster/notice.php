<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->getNotice($_REQUEST["lat"],$_REQUEST["lng"],$_REQUEST["member_id"],$_REQUEST["interval"]);
  outputXml($result);
?>