<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 class PosterMgr
 {
 	private static $instance = null;
	public static $dbmgr = null;
	public static $webServiceClient = null;
	public static function getInstance() {
		return self :: $instance != null ? self :: $instance : new PosterMgr();
	}

	private function __construct() {
		
	}
	
	public  function __destruct ()
	{
		
	}

	public function createPoster($request){
		$type=parameter_filter($request["type"])+0;
		$needs=parameter_filter($request["needs"]);
		$photos=parameter_filter($request["photos"]);
		$address=parameter_filter($request["address"]);
		$lng=parameter_filter($request["lng"])+0;
		$lat=parameter_filter($request["lat"])+0;
		$member_id=parameter_filter($request["member_id"])+0;

		if($needs==""){
			return	outResult(-1,"您没有写一下想说的话");
		}
		if($photos==""){
			return	outResult(-2,"你没有上传图片，别人可认不出的说的小可爱");
		}
		if($address==""||$lng==""||$lat==""){
			return	outResult(-3,"地址定位失败，请重新定位");
		}
		$photosarr=explode(";",$photos);
		$this->dbmgr->begin_trans();

		$poster_id=$this->dbmgr->getNewId("tb_n_poster");
		$sql="insert into tb_n_poster 
		(id,type,needs,photo,address,lat,lng,contact,created_date,created_id,updated_date,updated_id,status)
		values ($poster_id,$type,'$needs','".$photosarr[0]."','$address',$lat,$lng,'$contact'
		,".$this->dbmgr->getDate().",$member_id,".$this->dbmgr->getDate().",$member_id,'A')";
		$this->dbmgr->query($sql);

		$record_id=$this->dbmgr->getNewId("tb_n_record");
		$sql="insert into tb_n_record 
		(id,poster_id,type,needs,photo,address,lat,lng,contact,created_date,created_id,status)
		values ($record_id,$poster_id,$type,'$needs','".$photosarr[0]."','$address',$lat,$lng,'$contact'
		,".$this->dbmgr->getDate().",$member_id,'A')";
		$this->dbmgr->query($sql);

		foreach($photosarr as $photo){
			if(trim($photo)!=""){
				$photo_id=$this->dbmgr->getNewId("tb_n_photo");
				$sql="insert into tb_n_photo (id,poster_id,record_id,photo,created_date) values
				($photo_id,$poster_id,$record_id,'$photo',".$this->dbmgr->getDate().")";
				$this->dbmgr->query($sql);
			}
		}
		$this->dbmgr->commit_trans();
		return outResult(0,"提交成功",$poster_id);
	}

	public function getPosterList($lat,$lng){
		$lat=$lat+0;
		$lng=$lng+0;

		$sql="select *,abs((lat-$lat)*(lat-$lat)+(lng-$lng)*(lng-$lng)) distance
 from tb_n_poster
		where  status='A' and lat<>0 and lng<>0
		order by distance
		limit 0,100  ";
		//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

 }
 
 $posterMgr=PosterMgr::getInstance();
 $posterMgr->dbmgr=$dbmgr;
 
 
 
 
?>