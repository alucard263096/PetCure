<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  include ROOT.'/include/init.inc.php';
  include ROOT.'/classes/datamgr/poster.cls.php';
 require ROOT.'/classes/obj/upload.php';
  
  if($posterMgr->checkIfVerify($_REQUEST["verify"])==false){
	//print_r($_REQUEST);
	$file=$_FILES["pet_photo"];
	$orifilename=$file["name"];
	$filearr=explode(".",$file["name"]);
	$fileext=$filearr[count($filearr)-1];
	$filename=md5(date('ymdHIs').$file["name"]).".".$fileext;
	$folder=ROOT."/".$CONFIG['fileupload']['upload_path']."/pet/";
	 if(!file_exists($folder)){
		mkdir($folder,0777);
	 }
	$file=new Upload($file,$filename,$folder,true);
    $file->safetyUpload();
	$_REQUEST["pet_photo"]=$filename;

	$posterMgr->poster($_REQUEST);
  }

  ParentRedirect("index.php");
  
?>