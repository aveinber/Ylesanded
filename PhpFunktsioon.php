<?php
//error_reporting(0);
$sona = "abc   de";
$pikkus = strlen($sona);
for ($i=($pikkus-1); $i>=0; $i--)
{
	echo $sona[$i];
}

/*$tahed = str_split($sona);
$revsona='';
$i=count($tahed);
print_r($tahed);
while($i >= 0){
   $revsona .= $tahed[$i];
   $i--;
}
echo $revsona;
*/

?> 