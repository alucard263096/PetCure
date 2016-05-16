<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->getPosterList($_REQUEST["lat"],$_REQUEST["lng"],$_REQUEST["page"],$_REQUEST["count"]);
  outputXml($result);
?>