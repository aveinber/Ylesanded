<?php require_once('header.html');
$pildid = array(
		1=>array('src'=>"nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('src'=>"nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('src'=>"nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('src'=>"nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('src'=>"nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('src'=>"nameless6.jpg", 'alt'=>"nimetu 6"),
	);
	
			
	$muutuja="";
	 if (!empty($_GET["page"])) {
		 $muutuja=$_GET["page"];
		 }
	switch($muutuja){
	case "pealeht":
		include("pealeht.html");
	break;
	case "galerii":
		include("galerii.html");
	break;
	case "vote":
		include("vote.html");
	break;
	case "tulemus":
		include("tulemus.html");
	break;
	
	default:
		include("pealeht.html");
	break;
	}
	 require_once('footer.html');
	
?>