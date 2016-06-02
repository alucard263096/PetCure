<?php

class PosterXmlModel extends XmlModel{
	
	public function __construct($pagename){
		parent::__construct("poster",$pagename);
	}

	public function Save($dbMgr,$request,$sysuser){
		Global $SysLang; 
		if($request["primary_id"]==""){
			
			$type=parameter_filter($request["type"])+0;
			$needs=parameter_filter($request["needs"]);
			$photos=parameter_filter($request["photo"]);
			$address=parameter_filter($request["address"]);
			$contact=parameter_filter($request["contact"]);
			$lng=parameter_filter($request["lng"])+0;
			$lat=parameter_filter($request["lat"])+0;
			$member_id=1;

			
			$photosarr=explode(";",$photos);
			$dbMgr->begin_trans();


			$poster_id=$dbMgr->getNewId("tb_n_poster");
			$sql="insert into tb_n_poster 
				(id,type,needs,photo,address,lat,lng,contact,created_date,created_id,updated_date,updated_id,status)
				values ($poster_id,$type,'$needs','".$photosarr[0]."','$address',$lat,$lng,'$contact'
				,now(),$member_id,now(),$member_id,'A')";
			$dbMgr->query($sql);
			

			$record_id=$dbMgr->getNewId("tb_n_record");
			$sql="insert into tb_n_record 
			(id,poster_id,type,needs,photo,address,lat,lng,contact,created_date,created_id,status)
			values ($record_id,$poster_id,$type,'$needs','".$photosarr[0]."','$address',$lat,$lng,'$contact'
			,now(),$member_id,'A')";
			$dbMgr->query($sql);

			foreach($photosarr as $photo){
				if(trim($photo)!=""){
					$photo_id=$dbMgr->getNewId("tb_n_photo");
					$sql="insert into tb_n_photo (id,poster_id,record_id,photo,created_date) values
					($photo_id,$poster_id,$record_id,'$photo',now())";
					$dbMgr->query($sql);
				}
			}
			$dbMgr->commit_trans();
			return "right".$poster_id;

		}
		return parent::Save($dbMgr,$request,$sysuser);

	}



}

?>