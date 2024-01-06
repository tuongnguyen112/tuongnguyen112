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
function thongtin($tt){global $red,$trang,$ip,$name,$thanhngang,$diem;
echo $thanhngang;
echo  $red."[".$trang."$name".$red."] ".$red."[".$trang."$diem".$red."]   \n";
echo $thanhngang;}



$a1="Host: mtxgame.online";
$a2="upgrade-insecure-requests: 1";
$a3="user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36";
$a5="content-type:application/x-www-form-urlencoded";
system('clear');
$de="Số điểm hiện tại:
                                </td>
                                <td>";






$t=array($a3);
$ip=get("https://checkip.org",$t);

echo $ip;
echo $ipp=explode('<',explode('#5d9bD3;">',$ip)[1])[0];
echo strlen($ipp);



// if(strpos($ip, '125.234.229.57')==true){echo "cooooooooooooooooooo";}


exit;




while(true){$a++;
echo "Nhập cookie mtx $a: ";
$cookie[$a]=trim(fgets(STDIN));
if($cookie[$a]==false){break;}}





$de1="-";
while(true){$a=1;
$a4="cookie:$cookie[$a]";
$tsm1=array($a1,$a2,$a3,$a4);
$dangnhap=GET("https://mtxgame.online",$tsm1);
$play=explode('"',explode('https://mtxgame.online/play/',$dangnhap)[1])[0];
$name=explode(',',explode('Xin chào',$dangnhap)[1])[0];
$name=trim($name);
$job=GET("https://mtxgame.online/play/$play",$tsm1);
$diem =explode(''.$de1.'',explode(''.$de.'',$job)[1])[0];
$diem2[$a]=trim($diem);
$diem=$diem2[$a];
thongtin($tt);


for ($i=2400; $i >-1 ; $i--) { 
  echo "Cho sau $i giay\r";sleep(1);
}

}














?>
