<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->getPosterList($_REQUEST["lat"],$_REQUEST["lng"]);
  outputXml($result);
?>