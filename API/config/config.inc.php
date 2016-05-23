<?php

#[Root]
$CONFIG['rootpath']		= '/PetCure/API';  
//$CONFIG['charset']		= 'utf-8'; 
$CONFIG['URL']="http://www.myhkdoc.com";
$CONFIG["SessionName"]="PetCure";
$CONFIG["Title"]="宠物救助站";

$CONFIG['smarty']['rootpath']		= '/PetCure/API'; 
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


#[SMS]
$CONFIG["sms"]["AccountSid"]="aaf98f894bfd8efd014c0c06c970099e";
$CONFIG["sms"]["AccountToken"]="cdcb39a689d242f2af537b5ea4a86f61";
$CONFIG["sms"]["AppId"]="8a48b5514fa577af014fa675e7840459";
$CONFIG["sms"]["ServerIP"]="sandboxapp.cloopen.com";
$CONFIG["sms"]["ServerPort"]="8883";
$CONFIG["sms"]["SoftVersion"]="2013-12-26";
$CONFIG["sms"]["timeout"]="30";//mins
$CONFIG["sms"]["templeteid"]["reg"]="35123";
$CONFIG["sms"]["templeteid"]["login"]="35123";
?>