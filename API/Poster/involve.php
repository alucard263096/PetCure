<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->getInvolveList($_REQUEST["member_id"],$_REQUEST["page"],$_REQUEST["count"],$_REQUEST["type"],$_REQUEST["order"]);
  outputXml($result);
?>