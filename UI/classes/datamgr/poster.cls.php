<?php
 class PosterMgr
 {
 	private static $instance = null;
	public static $dbmgr = null;
	public static function getInstance() {
		return self :: $instance != null ? self :: $instance : new PosterMgr();
	}

	private function __construct() {
		
	}
	
	public function checkIfVerify($verify){
		$sql="select 1 from tb_poster where verify='$verify'  ";
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return count($return)>0;
	}
	public function poster($request){
		
		$this->dbmgr->begin_trans();
		$id = $this->dbmgr->getNewId("tb_poster");

		$verify=parameter_filter($request["verify"]);
		$pet_type=parameter_filter($request["pet_type"]);
		$pet_size=parameter_filter($request["pet_size"]);
		$pet_photo=parameter_filter($request["pet_photo"]);
		$pet_detail=parameter_filter($request["pet_detail"]);
		$rescue_type=parameter_filter($request["rescue_type"]);
		$rescue_level=parameter_filter($request["rescue_level"]);
		$rescue_address=parameter_filter($request["rescue_address"]);
		$rescue_detail=parameter_filter($request["rescue_detail"]);
		$rescue_need=parameter_filter($request["rescue_need"]);
		$rescue_lat=parameter_filter($request["rescue_lat"]);
		$rescue_lng=parameter_filter($request["rescue_lng"]);
		$contact_name=parameter_filter($request["contact_name"]);
		$contact_mobile=parameter_filter($request["contact_mobile"]);
		$contact_qq=parameter_filter($request["contact_qq"]);
		$contact_wechat=parameter_filter($request["contact_wechat"]);


		$sql="insert into tb_poster (id,verify,status,created_date,updated_date,
		pet_type,pet_size,pet_photo,pet_detail,
		rescue_type,rescue_level,rescue_address,rescue_detail,rescue_need,rescue_lat,rescue_lng,
		contact_name,contact_mobile,contact_qq,contact_wechat) values
		($id,'$verify','A',now(),now(),
		'$pet_type','$pet_size','$pet_photo','$pet_detail',
		'$rescue_type','$rescue_level','$rescue_address','$rescue_detail','$rescue_need','$rescue_lat','$rescue_lng',
		'$contact_name','$contact_mobile','$contact_qq','$contact_wechat')
				
		 ";
		$query = $this->dbmgr->query($sql);
		 
		$rid = $this->dbmgr->getNewId("tb_poster_record");
		
		$sql="insert into tb_poster_record (id,poster_id,created_date,
		pet_photo,pet_detail,
		rescue_type,rescue_level,rescue_address,rescue_detail,rescue_need,rescue_lat,rescue_lng,
		contact_name,contact_mobile,contact_qq,contact_wechat) values
		($rid,$id,now(),
		'$pet_photo','$pet_detail',
		'$rescue_type','$rescue_level','$rescue_address','$rescue_detail','$rescue_need','$rescue_lat','$rescue_lng',
		'$contact_name','$contact_mobile','$contact_qq','$contact_wechat')
		 ";
		$query = $this->dbmgr->query($sql);



		$this->dbmgr->commit_trans();

	}
	
	public function updatePoster($request){
		
		$this->dbmgr->begin_trans();
		$id = parameter_filter($request["id"])+0;

		$verify=parameter_filter($request["verify"]);
		$pet_type=parameter_filter($request["pet_type"]);
		$pet_size=parameter_filter($request["pet_size"]);
		$pet_photo=parameter_filter($request["pet_photo"]);
		$pet_detail=parameter_filter($request["pet_detail"]);
		$rescue_type=parameter_filter($request["rescue_type"]);
		$rescue_level=parameter_filter($request["rescue_level"]);
		$rescue_address=parameter_filter($request["rescue_address"]);
		$rescue_detail=parameter_filter($request["rescue_detail"]);
		$rescue_need=parameter_filter($request["rescue_need"]);
		$rescue_lat=parameter_filter($request["rescue_lat"]);
		$rescue_lng=parameter_filter($request["rescue_lng"]);
		$contact_name=parameter_filter($request["contact_name"]);
		$contact_mobile=parameter_filter($request["contact_mobile"]);
		$contact_qq=parameter_filter($request["contact_qq"]);
		$contact_wechat=parameter_filter($request["contact_wechat"]);
		
			$status='A';
		if($rescue_type=="K"){
			$status='C';
		}

		$sql="update tb_poster set verify='$verify',status='$status',updated_date=now(),
		pet_photo='$pet_photo',pet_detail='$pet_detail',
		rescue_type='$rescue_type',rescue_level='$rescue_level',rescue_address='$rescue_address',rescue_detail='$rescue_detail',rescue_need='$rescue_need',rescue_lat='$rescue_lat',rescue_lng='$rescue_lng',
		contact_name='$contact_name',contact_mobile='$contact_mobile',contact_qq='$contact_qq',contact_wechat='$contact_wechat'
		where id=$id
		 ";
		$query = $this->dbmgr->query($sql);
		 
		$rid = $this->dbmgr->getNewId("tb_poster_record");
		
		$sql="insert into tb_poster_record (id,poster_id,created_date,
		pet_photo,pet_detail,
		rescue_type,rescue_level,rescue_address,rescue_detail,rescue_need,rescue_lat,rescue_lng,
		contact_name,contact_mobile,contact_qq,contact_wechat) values
		($rid,$id,now(),
		'$pet_photo','$pet_detail',
		'$rescue_type','$rescue_level','$rescue_address','$rescue_detail','$rescue_need','$rescue_lat','$rescue_lng',
		'$contact_name','$contact_mobile','$contact_qq','$contact_wechat')
		 ";
		$query = $this->dbmgr->query($sql);



		$this->dbmgr->commit_trans();

	}




	public function getPosterList($lat,$lng){

		$sql="select *,abs((rescue_lat-$lat)*(rescue_lat-$lat)+(rescue_lng-$lng)*(rescue_lng-$lng)) distance
 from tb_poster
		where  status='A' and rescue_lat<>0 and rescue_lng<>0
		order by distance
		limit 0,100  ";
		//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

	public function getPoster($id){
		$sql="select * from tb_poster where id=$id  ";
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array($query);

		return $return;
	}

	public function getPosterRecord($id){
		$sql="select * from tb_poster_record where poster_id=$id  ";
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

	
	public function getPosterPhoto($poster_id){
		$poster_id=$poster_id+0;

		$sql="select a.id record_id,a.type,a.needs,a.address,a.contact,a.created_date,
				b.id photo_id,b.photo from  tb_n_record a 
				inner join tb_n_photo b on a.id=b.record_id
				where a.poster_id=$poster_id
				order by a.created_date desc, b.id ";
				//--or (DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= date(updated_date) and status='C')
		$query = $this->dbmgr->query($sql);
		$return = $this->dbmgr->fetch_array_all($query);

		return $return;
	}

	public  function __destruct ()
	{
		
	}
 }
 
 $posterMgr=PosterMgr::getInstance();
 $posterMgr->dbmgr=$dbmgr;
 
 
 
 
?>