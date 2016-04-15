<?php 
session_start();


if (isset($_POST["submit"]) && !empty($_POST["submit"]) ) {
	$_SESSION["pilt"] = $_POST["pilt"];
	
}
if (isset($_POST["submit2"])) {
	$_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
}

require_once('header.html');
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
	if(isset($_SESSION["pilt"]) && !empty($_SESSION["pilt"])){
		echo "Oled valiku teinud, uuesti hääletamiseks lõpeta sessioon";
		include("tulemus.html");
	}else{
		echo "Valikut pole tehtud";
		include("vote.html");
	}	

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