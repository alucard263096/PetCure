<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
  $result=$posterMgr->createPoster($_REQUEST);
  outputXml($result);
?>