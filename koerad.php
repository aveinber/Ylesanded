<?php
$koerad= array( 
		array('nimi'=>'Pauka', 'vanus'=>2,'varvus'=>'pruun', 'omanik'=>'Pedro'), 
		array('nimi'=>'Pontu', 'vanus'=>1,'varvus'=>'valge', 'omanik'=>'Jaak'),
		array('nimi'=>'Rambo', 'vanus'=>3,'varvus'=>'hall', 'omanik'=>'Tiina'),
		array('nimi'=>'Reks', 'vanus'=>6,'varvus'=>'pruun', 'omanik'=>'Vello'),
		array('nimi'=>'Chappy', 'vanus'=>4,'varvus'=>'must', 'omanik'=>'Ahmed'),
	);

	foreach($koerad as $koer){
    include("koerad.html");
	}
  
	?>