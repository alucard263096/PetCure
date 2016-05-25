<?php

#[Root]
$CONFIG['rootpath']		= '/PetCure/UI';  
//$CONFIG['charset']		= 'utf-8'; 
$CONFIG['URL']="http://www.myhkdoc.com/PetCure/UI";
$CONFIG['API']="/PetCure/API";
$CONFIG["SessionName"]="PetCure";
$CONFIG["Title"]="流浪宠物日记";

$CONFIG['smarty']['rootpath']		= '/PetCure/UI'; 
$CONFIG['solution_configuration']='debug';
$CONFIG['server']		= 'windows';   //windows or linux

#[Smarty config]
$CONFIG['smarty']['compile_check']=true; 
$CONFIG['smarty']['debugging']=false; 
$CONFIG['smarty']['caching']=false; 
$CONFIG['smarty']['cache_lifetime']=3600; //second,-1 is always on 


#[log]
$CONFIG['logsavedir'] 		= 'logs/';	
$CONFIG['error_handler'] ="E_ALL";




#[Database]
$CONFIG['database']['provider']	= 'mysql';  //mssql,sqlsrv
$CONFIG['database']['host']		= 'localhost';  
$CONFIG['database']['database']	= 'cw_petcure';  
$CONFIG['database']['user']		= 'root';  
$CONFIG['database']['psw']		= 'root'; 


#[File upload]
$CONFIG['fileupload']['upload_path']	= "upload";
$CONFIG['fileupload']['nt_check']		= false;
$CONFIG['fileupload']['ftp_url']		= "127.0.0.1";
$CONFIG['fileupload']['ftp_user']		= "anonymous";
$CONFIG['fileupload']['ftp_password']		= "";
$CONFIG['fileupload']['ftp_dir']		= "/";
$CONFIG['fileupload']['try_time']		= "3";
$CONFIG['fileupload']['try_interval']		= "1";//second


#[Tencent]
$CONFIG['Tencent']["MapKey"]="EBWBZ-CZN3K-4O5JK-A3WQF-5HOCS-HUB2O";

#[Wechat]
$CONFIG['Wechat']["AppId"]="wxed38866af330cfd8";
$CONFIG['Wechat']["AppSecret"]="31d0b2c9740ddd3c838f19b42de80887";


?>