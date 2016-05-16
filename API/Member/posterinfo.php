<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/member.cls.php';
  $result=$memberMgr->posterInfo($_REQUEST["member_id"],$_REQUEST["poster_id"]);
  outputXml($result);

?>