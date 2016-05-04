<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 class MemberMgr
 {
 	private static $instance = null;
	public static $dbmgr = null;
	public static $webServiceClient = null;
	public static function getInstance() {
		return self :: $instance != null ? self :: $instance : new MemberMgr();
	}

	private function __construct() {
		
	}
	
	public  function __destruct ()
	{
		
	}

	public function sendLoginVerifyCode($mobile){
		if($mobile==""){
			return	outResult(-1,"mobile can not be null");
		}
		$mobile=parameter_filter($mobile);
		$sql="select count(1) from tb_member where mobile='$mobile' ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array($query); 
		if($result[0]==0){
			return	outResult(-2,"no this mobile no");
		}

		Global $smsMgr;
		$smsMgr->SendLoginVerifyCodeMessage($mobile);

		return	outResult(0,"sent success");
	}

	public function updateMemberInfo($member_id,$field,$value){
		
		$member_id=parameter_filter($member_id);
		$field=parameter_filter($field);
		$value=parameter_filter($value);

		$sql="select 1 from tb_member where id=$member_id ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query); 
		if(count($result)==0){
			return	outResult(-2,"no this member ");
		}

		$sql="update tb_member set $field='$value' where id=$member_id ";
		$query = $this->dbmgr->query($sql);

		return	outResult(0,"update success",$id);
	}

	
	public function getMemberInfoByMobile($mobile){
		if($mobile==""){
			return	outResult(-1,"mobile  can not be null");
		}
		$mobile=parameter_filter($mobile);
		$sql="select * from tb_member where mobile='$mobile'  ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query); 
		if(count($result)==0){
			return	outResult(-2,"no this mobile no ");
		}

		Global $smsMgr;
		$res=$smsMgr->getLastSent($mobile,"L");
		$lastsent_verifycode=$res["code"];

		$result[0][count($result[0])/2]=$lastsent_verifycode;
		$result[0]["verifycode"]=$lastsent_verifycode;

		return	$result;

	}
	
	public function getMemberInfoById($member_id){
		if($member_id==""){
			return	outResult(-1,"member_id  can not be null");
		}
		$member_id=parameter_filter($member_id);
		$sql="select * from tb_member where id=$member_id  ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query); 
		if(count($result)==0){
			return	outResult(-2,"no this member ");
		}

		return	$result;

	}

	public function sendRegisterVerifyCode($mobile){
		if($mobile==""){
			return	outResult(-1,"mobile can not be null");
		}
		$mobile=parameter_filter($mobile);
		$sql="select count(1) from tb_member where mobile='$mobile' ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array($query); 
		if($result[0]>0){
			return	outResult(-2,"mobile has been used");
		}

		Global $smsMgr;
		$smsMgr->SendRegisterVerifyCodeMessage($mobile);

		
			return	outResult(0,"sent success");

	}


	public function registerMember($mobile,$verifycode,$password,$name){
		if($mobile==""){
			return	outResult(-1,"mobile can not be null");
		}
		if($verifycode==""){
			return	outResult(-11,"verify code can not be null");
		}
		if($password==""){
			return	outResult(-12,"password can not be null");
		}
		$mobile=parameter_filter($mobile);
		$sql="select count(1) from tb_member where mobile='$mobile' ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array($query); 
		if($result[0]>0){
			return	outResult(-2,"mobile has been used");
		}

		Global $smsMgr;
		$lastsent_verifycode=$smsMgr->getLastSent($mobile,"G");
		if($verifycode!=$lastsent_verifycode["code"]){
			return	outResult(-3,"verify code is incorrect");
		}

		$id=$this->dbmgr->getNewId("tb_member");
		$sql="insert into tb_member (id,openid,mobile,password,name,status,created_date,created_user,updated_date,updated_user) values
		($id,'','$mobile','$password','$name','A',".$this->dbmgr->getDate().",-1,".$this->dbmgr->getDate().",-1)";

		$query = $this->dbmgr->query($sql);

		return	outResult(0,"register success",$id);
	}

	public function loginReg($mobile,$password){
	
		if($mobile==""){
			return	outResult(-1,"mobile can not be null");
		}
		if($password==""){
			return	outResult(-2,"password can not be null");
		}
		

		$mobile=parameter_filter($mobile);
		$password=parameter_filter($password);
		$sql="select id,openid,mobile,password from tb_member where mobile='$mobile'  ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query); 
		if(count($result)==0){
			$id=$this->dbmgr->getNewId("tb_member");
			$sql="insert into tb_member (id,openid,mobile,password,name,status,created_date,created_user,updated_date,updated_user) values
			($id,'','$mobile','$password','$mobile','A',".$this->dbmgr->getDate().",-1,".$this->dbmgr->getDate().",-1)";
			$query = $this->dbmgr->query($sql);
		}else{
			if($result[0]["password"]!=$password){
				return array();
			}
		}
		
		$sql="select id,openid,mobile,name,photo,status,created_date,created_user,updated_date,updated_user from tb_member where mobile='$mobile'  ";
		$query = $this->dbmgr->query($sql);
		$result = $this->dbmgr->fetch_array_all($query); 

		return $result;


	}

 }
 
 $memberMgr=MemberMgr::getInstance();
 $memberMgr->dbmgr=$dbmgr;
 
 
 
 
?>