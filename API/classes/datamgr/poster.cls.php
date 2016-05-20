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
		$contact=parameter_filter($request["contact"]);
		$lng=parameter_filter($request["lng"])+0;
		$lat=parameter_filter($request["lat"])+0;
		$member_id=parameter_filter($request["member_id"])+0;
		$poster_id=parameter_filter($request["poster_id"])+0;
		$save=parameter_filter($request["save"]);

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


		if($poster_id==0){
			$poster_id=$this->dbmgr->getNewId("tb_n_poster");
			$sql="insert into tb_n_poster 
			(id,type,needs,photo,address,lat,lng,contact,created_date,created_id,updated_date,updated_id,status)
			values ($poster_id,$type,'$needs','".$photosarr[0]."','$address',$lat,$lng,'$contact'
			,".$this->dbmgr->getDate().",$member_id,".$this->dbmgr->getDate().",$member_id,'A')";
			$this->dbmgr->query($sql);
		}else{

			if($save=='Y'){
				$status='F';
			}else{
				$status='A';
			}
			$sql="update tb_n_poster set
			needs='$needs',photo='".$photosarr[0]."',address='$address',lat='$lat',lng='$lng',contact='$lng'
			,updated_date=".$this->dbmgr->getDate().",updated_id=$member_id,status='$status'
			where id=$poster_id ";
			$this->dbmgr->query($sql);
		}

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

	public function getPosterList($lat,$lng,$page,$count,$type,$order){
		$lat=$lat+0;
		$lng=$lng+0;
		$type=$type+0;
		$order=$order+0;
		$condition="";
		$orderby="distance";
		if($type==1){
			$condition=" and type='0'";
		}else if($type==2){
			$condition=" and type='1'";
		}
		if($order==0){
			$orderby="distance";
		}else if($order==1){
			$orderby=" updated_date desc";
		}else if($order==2){
			$orderby=" updated_date";
		}else if($order==3){
			$orderby=" collectcount desc";
		}else if($order==4){
			$orderby=" followcount desc";
		}

		$page=$page+0;
		$count=$count+0;
		if($count==0){
			$count=20;
		}
		$pageindex=$page*$count;

		$sql="select *,abs((lat-$lat)*(lat-$lat)+(lng-$lng)*(lng-$lng)) distanceji
 from tb_n_poster
		where  status='A' and lat<>0 and lng<>0 $condition
		order by $orderby
		limit $pageindex,$count  ";
		//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

	public function getPosterPhoto($poster_id){
		$poster_id=$poster_id+0;

		$sql="select a.id record_id,a.type,a.needs,a.address,a.contact,a.created_date,c.created_id created_member,
				b.id photo_id,b.photo from  tb_n_record a 
				inner join tb_n_photo b on a.id=b.record_id
				inner join tb_n_poster c on a.poster_id=c.id
				where a.poster_id=$poster_id
				order by a.created_date desc, b.id ";
				//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

	
	public function getFollowList($member_id,$page,$count,$type,$order){
		$member_id=$member_id+0;
		$type=$type+0;
		$order=$order+0;
		$condition="";
		$orderby="b.created_date desc";
		if($type==1){
			$condition=" and type='0'";
		}else if($type==2){
			$condition=" and type='1'";
		}
		if($order==0){
			$orderby="b.created_date desc";
		}else if($order==1){
			$orderby=" b.created_date ";
		}else if($order==2){
			$orderby=" a.updated_date desc";
		}else if($order==2){
			$orderby=" a.updated_date";
		}

		$page=$page+0;
		$count=$count+0;
		if($count==0){
			$count=20;
		}
		$pageindex=$page*$count;

		$sql="select a.* 
 from tb_n_poster a
 inner join tb_member_follow b on a.id=b.poster_id and b.member_id=$member_id
 where 1=1 $condition
		order by $orderby
		limit $pageindex,$count  ";
		//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}
	
	public function getCollectList($member_id,$page,$count,$type,$order){
		$member_id=$member_id+0;
		$type=$type+0;
		$order=$order+0;
		$condition="";
		$orderby="b.created_date desc";
		if($type==1){
			$condition=" and type='0'";
		}else if($type==2){
			$condition=" and type='1'";
		}
		if($order==0){
			$orderby="b.created_date desc";
		}else if($order==1){
			$orderby=" b.created_date ";
		}else if($order==2){
			$orderby=" a.updated_date desc";
		}else if($order==2){
			$orderby=" a.updated_date";
		}

		$page=$page+0;
		$count=$count+0;
		if($count==0){
			$count=20;
		}
		$pageindex=$page*$count;

		$sql="select a.* 
 from tb_n_poster a
 inner join tb_member_collect b on a.id=b.poster_id and b.member_id=$member_id
 where 1=1 $condition
		order by $orderby
		limit $pageindex,$count  ";
		//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}
	
	public function getInvolveList($member_id,$page,$count,$type,$order){
		$member_id=$member_id+0;
		$type=$type+0;
		$order=$order+0;
		$condition="";
		$orderby="b.created_date desc";
		if($type==1){
			$condition=" and type='0'";
		}else if($type==2){
			$condition=" and type='1'";
		}
		if($order==0){
			$orderby="c.created_date desc";
		}else if($order==1){
			$orderby=" c.created_date ";
		}else if($order==2){
			$orderby=" a.updated_date desc";
		}else if($order==2){
			$orderby=" a.updated_date";
		}

		$page=$page+0;
		$count=$count+0;
		if($count==0){
			$count=20;
		}
		$pageindex=$page*$count;

		$sql="select distinct a.* 
 from tb_n_poster a
 inner join tb_n_record c on a.id=c.poster_id and c.created_id=$member_id
 where 1=1 $condition
		order by $orderby
		limit $pageindex,$count  ";
		//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

	public function createHint($request){
		$needs=parameter_filter($request["needs"]);
		$photos=parameter_filter($request["photos"]);
		$address=parameter_filter($request["address"]);
		$contact=parameter_filter($request["contact"]);
		$lng=parameter_filter($request["lng"])+0;
		$lat=parameter_filter($request["lat"])+0;
		$member_id=parameter_filter($request["member_id"])+0;
		$poster_id=parameter_filter($request["poster_id"])+0;

		if($needs==""){
			return	outResult(-1,"您没有写一下想说的话");
		}
		$photosarr=explode(";",$photos);
		$this->dbmgr->begin_trans();

		$id=$this->dbmgr->getNewId("tb_n_hint");
		$sql="insert into tb_n_hint 
		(id,poster_id,needs
		,photo1,photo2,photo3,photo4,photo5,photo6,photo7,photo8,
		address,lat,lng,contact
		,created_date,created_id,status)
		values ($id,$poster_id,'$needs'
		,'".$photosarr[0]."','".$photosarr[1]."','".$photosarr[2]."','".$photosarr[3]."','".$photosarr[4]."','".$photosarr[5]."','".$photosarr[6]."','".$photosarr[7]."'
		,'$address',$lat,$lng,'$contact'
		,".$this->dbmgr->getDate().",$member_id,'A')";
		$this->dbmgr->query($sql);

		
		$this->dbmgr->commit_trans();
		return outResult(0,"提交成功",$poster_id);
	}

	public function hintList($poster_id,$page,$count){

	
		$page=$page+0;
		$count=$count+0;
		if($count==0){
			$count=20;
		}
		$pageindex=$page*$count;

		$poster_id=$poster_id+0;
		$sql="select * from tb_n_hint 
		where poster_id=$poster_id 
		order by created_date desc 
		limit $pageindex,$count ";
		$this->dbmgr->query($sql);
		
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);
		return $return;
	}
 }
 
 $posterMgr=PosterMgr::getInstance();
 $posterMgr->dbmgr=$dbmgr;
 
 
 
 
?>