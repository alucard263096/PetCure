<?php
  require '../include/common.inc.php';
  include ROOT.'/classes/datamgr/member.cls.php';
  $result=$memberMgr->collectPoster($_REQUEST["member_id"],$_REQUEST["poster_id"],$_REQUEST["collect"]);
  outputXml($result);

?>