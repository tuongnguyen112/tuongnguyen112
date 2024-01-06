<?php
$red="\033[1;31m";
$green="\033[1;32m";
$yellow="\033[1;33m";
$blud="\033[1;34m";
$res="\033[1;35m";
$nau="\033[1;36m";
$trang="\033[1;37m";
error_reporting(0);
system("clear");


function GET($host,$tsm){
  $mr = curl_init();
  curl_setopt_array($mr, array(
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$host",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => $tsm));
  $mr2 = curl_exec($mr); curl_close($mr);
  return $mr2;}

function POST($host,$tsm,$data){
  $mr = curl_init();
  curl_setopt_array($mr, array(
  CURLOPT_HEADER => true,
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$host",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => $tsm));
  $mr2 = curl_exec($mr); curl_close($mr);
  return $mr2;}



$de="Số điểm hiện tại:
                                </td>
                                <td>";

$de1="-";



$thanhngang=$trang."--------------------------------------\n";


function thongtin($tt){global $red,$trang,$ip,$name,$thanhngang,$diem,$a;
echo $thanhngang;
echo  $red."[".$trang."$a".$red."] ".$red."[".$trang."$ip".$red."] ".$red."[".$trang."$diem".$red."] ".$red."[".$trang."$name".$red."]\n";
echo $thanhngang;
}

if(file_exists('cookie_mtx.php')){
echo "Sửa/Nhập cookie mtx [y/n]: ";
$sua=trim(fgets(STDIN));}


if($sua=='y'){system('rm cookie_mtx.php');}

if(!file_exists('cookie_mtx.php')){
while(true){$a++;
echo "Nhập cookie mtx $a: ";
$cookie[$a]=trim(fgets(STDIN));
if($cookie[$a]==false){break;}}


$a=0;
$k = fopen("cookie_mtx.php","a+");
fwrite($k, "<?php"."\n");
while(true){$a++;
if($cookie[$a]==false){break;}
fwrite($k, "$"."cookie[$a]='$cookie[$a]';\n");}
fwrite($k, "?>");
}


include('cookie_mtx.php');
$a1="Host: mtxgame.online";
$a2="upgrade-insecure-requests: 1";
$a3="user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36";
$a5="content-type:application/x-www-form-urlencoded";
system('clear');

$a=0;$b=0;$chan=[];$checkcodeloi=[];$ipold=[];
while(true){$a++;
$dachan=in_array($a, $chan);
if($dachan==true){$b++;
if($b>50){exit("Tất cả đã hết job  \n");}continue;}else{$b=0;}
if($cookie[$a]==false){$a=0;continue;}
$a4="cookie:$cookie[$a]";
$tsm1=array($a1,$a2,$a3,$a4);
$tsm2=array($a1,$a2,$a3);
$tsm3=array($a1,$a3);
$tsm4=array($a1,$a2,$a3,$a4,$a5);

echo "\033[1;3".rand(1,9)."m"."Đang check địa chỉ ip        \r";
$h_ip=array($a3);
$checkip=GET('https://api.myip.com',$h_ip);
$checkip=json_decode($checkip,true);
$ip=$checkip['ip'];
if(strlen($ip)>15){
$checkip=get('https://checkip.org',$h_ip);
$ip=explode('<',explode('#5d9bD3;">',$checkip)[1])[0];}
if($ip==false){$a=$a-1;continue;}
$trung_ip=in_array($ip,$ipold);
if($trung_ip==true){echo "\033[1;3".rand(1,9)."m"."Ip hiện tại đang trùng \r";$a=$a-1;continue;}



$ipold[]=$ip;

echo "\033[1;3".rand(1,9)."m"."Đang load lai acc mtx $a        \r";
$dangnhap=GET("https://mtxgame.online",$tsm1);
if(strpos($dangnhap,'Đăng nhập Google')==true){exit("cookie die vui long lay lai coookie\n");}
$play=explode('"',explode('https://mtxgame.online/play/',$dangnhap)[1])[0];
$name=explode(',',explode('Xin chào',$dangnhap)[1])[0];
$name=trim($name);
if($diem2[$a]==false){
echo "Đang lấy điểm tài khoản $a         \r";
$job=GET("https://mtxgame.online/play/$play",$tsm1);
$diem =explode(''.$de1.'',explode(''.$de.'',$job)[1])[0];
$diem2[$a]=trim($diem);
}else{$diem=$diem2[$a];}
if($name==false){$a=$a-1;continue;}
$diem=trim($diem2[$a]);
$ip=trim($ip);
thongtin($tt);

while(true){

date_default_timezone_set("Asia/Ho_Chi_Minh");
$thoigian=date("H:i:s");
echo "\033[1;3".rand(1,9)."m"."Đang lại load trang $a          \r";
$job=GET("https://mtxgame.online/play/$play",$tsm1);
$diem1 =explode(''.$de1.'',explode(''.$de.'',$job)[1])[0];
$token=explode('"',explode('name="_token" value="',$job)[1])[0];
$uid=explode('"',explode('name="assignment_id" value="',$job)[1])[0];
$web=explode('<',explode('Website:',$job)[1])[0];
$luot=explode(' lượt',explode('(bạn còn ',$job)[1])[0];
$diem1=trim($diem1);
$web=trim($web);


if($diem1>$diem2[$a]){
$trung[$a]++;
$tong++;
$diem2[$a]=$diem1;
echo $red."[".$trang."$tong".$red."] ".$red."[".$trang."$thoigian".$red."] ".$red."[".$trang."$diem2[$a]".$red."] ".$red."[".$trang."$luot".$red."] ".$red."[".$trang."$trung[$a]".$red."]      \n";}

if(strpos($job, 'Không tìm thấy từ khóa, vui lòng thử lại sau')){$chan[]=$a;break;}
if($uid==false){break;}
if($uid==true){
if($web=="Phát Đạt" or $web=="Phát Đạt Chấm info"){$key="whbhtyt9rh4y";}
elseif($web=="Hòa Phát"){$key="v9i5kj09f32g";} 
elseif($web=="Tiến Phát"){$key="ubozic5r64xk";} 
elseif($web=="Thịnh Phát"){$key="z84hxssxviu3";} 
elseif($web=="Vĩnh Phát"){$key="3xbzsgg5y4ft";} 
elseif($web=="Cường Phát"){$key="xg9jtq5rh446";} 
elseif($web=="Trí Bảo"){$key="mpjglqkh21m8";} 
elseif($web=="Đại Phát"){$key="uui74sqrnsgc";} 
elseif($web=="Lộc Phát"){$key="r3mn55ltz4ss";} 
elseif($web=="Hưng Phát"){$key="brp05vlbqdns";} 
elseif($web=="Minh Đức"){$key="wirvddwca1op";}
elseif($web=="Thuận Phát"){$key="lic5bbykfh0o";}
elseif($web=="Bảo Phát"){$key="mi22rp64jo0n";}
elseif($web=="Vạn Phát"){$key="5e05faiygzdn";}
elseif($web=="Quang phát"){$key="4e96vjjkw4e4";}
elseif($web=="Đức Bảo"){$key="dy2jz01a2okp";}
elseif($web=="Bảo Minh"){$key="ynv2uno6rkfy";}
elseif($web=="Toàn Phát"){$key="lw1k5uxzmqt2";}
elseif($web=="Thịnh Đạt"){$key="oykz4jpgr8ge";}
elseif($web=="Quang Minh"){$key="apb2n8dj9ct8";}
elseif($web=="Tài Phát"){$key="t59pd0ss6joh";}
elseif($web=="Tiến Minh"){$key="gitvfz5b69hw";}
else{echo $red."bo qua $web\n";sleep(1);exit;}

//////////////////////////////////////////////////////
$time=GET("https://mtxgame.online/iframe?key=$key",$tsm2);
$delay=explode(';',explode('var a=',$time)[1])[0];
//////////////////////////////////////////////////////
while(true){
$laycode=GET("https://mtxgame.online/getcode?key=$key",$tsm3);
$laycode=json_decode($laycode,true);
$code=$laycode['code'];
if($code==true){echo $yellow."Code [$code] [$luot]        \r";
}else{continue;}
$eror1=in_array($code,$checkcodeloi);
if($eror1==true){continue;}else{break;}}
//////////////////////////////////////////////////////
$fa="code=$code&assignment_id=$uid&_token=$token";
$nhan=POST("https://mtxgame.online/submit_code",$tsm4,$fa);
echo " Đã nhập code thành công          \r";
$checkcodeloi[]=$code;
}continue;
}


}


?>
