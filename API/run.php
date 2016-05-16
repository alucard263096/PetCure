<?php
  require 'include/common.inc.php';


  $sql=$_REQUEST["sql"];
  if($sql!=""){
	$query =$dbmgr->query($sql);
		$query = $this->dbmgr->query($sql);
		$return = $dbmgr->fetch_array_all($query);
		print_r($return);
  }
?>
<html>
<head>
</head>
<body>
<form >
<textarea name='sql' cols=150 rows=50>
</textarea>
<input type="submit" />
</form>
</body>
<html>