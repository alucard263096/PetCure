<?php
/*
 * Created on 2011-1-22
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 

 class Resize{
 private $filename;
 private $width;
 private $height;

 	function __construct($filename,$width,$height)
 	{
 		$this->filename=$filename;
		$this->width=$width;
		$this->height=$height;
 	}

	public function DoResize(){
		$show_pic_scal=$this->show_pic_scal($this->width, $this->height, $this->filename);
		$this->resize($this->filename,$show_pic_scal[0],$show_pic_scal[1]);
	}
 	
	
function show_pic_scal($width, $height, $picpath) {     
    $imginfo = $this->getImageInfo( $picpath );     
    $imgw = $imginfo [0];     
    $imgh = $imginfo [1];     
         
    $ra = number_format ( ($imgw / $imgh), 1 ); //��߱�     
    $ra2 = number_format ( ($imgh / $imgw), 1 ); //�߿��     
         
    
    if ($imgw > $width or $imgh > $height) {     
        if ($imgw > $imgh) {     
            $newWidth = $width;     
            $newHeight = round ( $newWidth / $ra );     
             
        } elseif ($imgw < $imgh) {     
            $newHeight = $height;     
            $newWidth = round ( $newHeight / $ra2 );     
        } else {     
            $newWidth = $width;     
            $newHeight = round ( $newWidth / $ra );     
        }     
    } else {     
        $newHeight = $imgh;     
        $newWidth = $imgw;     
    }     
    $newsize [0] = $newWidth;     
    $newsize [1] = $newHeight;     
         
    return $newsize;     
}     
    
    
    
function getImageInfo($src)     
{     
    return getimagesize($src);     
}   
  
/**   
* ����ͼƬ��������Դ����   
* @param string $src ͼƬ·��   
* @return resource $im ������Դ����    
* **/    
function create($src)     
{     
    $info=$this->getImageInfo($src);     
    switch ($info[2])     
    {     
        case 1:     
            $im=imagecreatefromgif($src);     
            break;     
        case 2:     
            $im=imagecreatefromjpeg($src);     
            break;     
        case 3:     
            $im=imagecreatefrompng($src);     
            break;     
    }     
    return $im;     
}     

/**   
* ����ͼ������   
* @param string $src ͼƬ·��   
* @param int $w ����ͼ���   
* @param int $h ����ͼ�߶�   
* @return mixed ��������ͼ·��   
* **/    
    
function resize($src,$w,$h)     
{     
    $temp=pathinfo($src);     
    $name=$temp["basename"];//�ļ���     
    $dir=$temp["dirname"];//�ļ����ڵ��ļ���     
    $extension=$temp["extension"];//�ļ���չ��     
    $savepath="{$dir}/a{$name}";//����ͼ����·��,�µ��ļ���Ϊ*.thumb.jpg     
    
    //��ȡͼƬ�Ļ�����Ϣ     
    $info=$this->getImageInfo($src);     
    $width=$info[0];//��ȡͼƬ���     
    $height=$info[1];//��ȡͼƬ�߶�     
    $per1=round($width/$height,2);//����ԭͼ�����     
    $per2=round($w/$h,2);//��������ͼ�����     
    
    //�������ű���     
    if($per1>$per2||$per1==$per2)     
    {     
        //ԭͼ����ȴ��ڻ��ߵ�������ͼ����ȣ����տ������     
        $per=$w/$width;     
    }     
    if($per1<$per2)     
    {     
        //ԭͼ�����С������ͼ����ȣ����ո߶�����     
        $per=$h/$height;     
    }     
    $temp_w=intval($width*$per);//����ԭͼ���ź�Ŀ��     
    $temp_h=intval($height*$per);//����ԭͼ���ź�ĸ߶�     
    $temp_img=imagecreatetruecolor($temp_w,$temp_h);//��������     
    $im=$this->create($src);
    imagecopyresampled($temp_img,$im,0,0,0,0,$temp_w,$temp_h,$width,$height);     
    if($per1>$per2)     
    {     
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im);     
        return $this->addBg($savepath,$w,$h,"w");     
        //������ȣ�������֮��߶Ȳ��������²��ϱ���     
    }     
    if($per1==$per2)     
    {     
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im);     
        return $savepath;     
        //�ȱ�����     
    }     
    if($per1<$per2)     
    {     
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im);     
        return $this->addBg($savepath,$w,$h,"h");     
        //�߶����ȣ�������֮���Ȳ��������²��ϱ���     
    }     
}     

/**   
* ��ӱ���   
* @param string $src ͼƬ·��   
* @param int $w ����ͼ����   
* @param int $h ����ͼ��߶�   
* @param String $first ����ͼ������λ�õģ�w ������� h �߶����� wh:�ȱ�   
* @return ���ؼ��ϱ�����ͼƬ   
* **/    
function addBg($src,$w,$h,$fisrt="w")     
{     
    $bg=imagecreatetruecolor($w,$h);     
    $white = imagecolorallocate($bg,255,255,255);     
    imagefill($bg,0,0,$white);//��䱳��     
    
    //��ȡĿ��ͼƬ��Ϣ     
    $info=$this->getImageInfo($src);     
    $width=$info[0];//Ŀ��ͼƬ���     
    $height=$info[1];//Ŀ��ͼƬ�߶�     
    $img=$this->create($src);     
    if($fisrt=="wh")     
    {     
        //�ȱ�����     
        return $src;     
    }     
    else    
    {     
        if($fisrt=="w")     
        {     
            $x=0;     
            $y=($h-$height)/2;//��ֱ����     
        }     
        if($fisrt=="h")     
        {     
            $x=($w-$width)/2;//ˮƽ����     
            $y=0;     
        }     
        imagecopymerge($bg,$img,$x,$y,0,0,$width,$height,100);     
        imagejpeg($bg,$src,100);     
        imagedestroy($bg);     
        imagedestroy($img);     
        return $src;     
    }     
    
}     
	
 }
 
 
 
 
 
 
?>