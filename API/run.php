<?php
  require 'include/common.inc.php';


  $sql=$_REQUEST["sql"];
  if($sql!=""){
	$dbmgr->query($sql);
  }
?>
<html>
<head>
</head>
<body>
<form >
<textarea name='sql' cols=150 rows=50>

</textarea>
</form>
</body>
<html>