<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/member.cls.php';
  $result=$memberMgr->followPoster($_REQUEST["member_id"],$_REQUEST["poster_id"],$_REQUEST["follow"]);
  outputXml($result);

?>