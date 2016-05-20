<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->hintList($_REQUEST["poster_id"]);
  outputXml($result);
?>