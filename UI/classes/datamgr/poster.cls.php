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

	}
	public  function __destruct ()
	{
		
	}
 }
 
 $posterMgr=PosterMgr::getInstance();
 $posterMgr->dbmgr=$dbmgr;
 
 
 
 
?>