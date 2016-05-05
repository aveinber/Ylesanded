<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}


function kuva_puurid(){
	// siia on vaja funktsionaalsust
	if(!empty($_SESSION['user'])){
	
	global $connection;
	$p= mysqli_query($connection, "select distinct(puur) as puur from aveinber_loomaaed order by puur asc");
	$puurid=array();
	while ($r=mysqli_fetch_assoc($p)){
		$l=mysqli_query($connection, "SELECT * FROM aveinber_loomaaed WHERE  puur=".mysqli_real_escape_string($connection, $r['puur']));
		while ($row=mysqli_fetch_assoc($l)) {
			$puurid[$r['puur']][]=$row;
		}
	}
	include_once('views/puurid.html');
	}
	if(empty($_SESSION['user']))
	{
		include_once('views/login.html');
	}
}	
	
	
function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
    $errors=array();
	
       if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(in_array("", $_POST)){
				$errors[] = "Kasutajanimi ja/või parool täita!";
				include_once('views/login.html');
			}else{
			     $errors[] = "Kasutajanimi ja/või parool on vale!";
				global $connection;
	           $username=mysqli_real_escape_string($connection, $_POST['username']);
	           $password=mysqli_real_escape_string($connection, $_POST['password']);
			   $query ="SELECT id, username FROM aveinber_kylastajad WHERE username='$username' and passw=sha1('$password')";
			   $result = mysqli_query($connection, $query) or die("Ei saanud päringut teha ".mysqli_error($connection));
			   $kasutajarida=mysqli_fetch_assoc($result);
			   if($kasutajarida['username']== $_POST['username']){
				  $_SESSION['user']=$username;
				  header('Location:loomaaed.php?page=loomad');   
			   }
			include_once('views/login.html');
		}
	}else{
		include_once('views/login.html');
		}
	}



function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	$errors=array();
	if(!empty($_SESSION['username'])){
		include_once('views/login.html');
	} else
	{  
       if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(in_array("", $_POST)){
				$errors[] = "Väljad täita!";
				include_once('views/loomavorm.html');
			}else{
			    global $connection;
				upload('liik');
	            $nimi=mysqli_real_escape_string($connection, $_POST['nimi']);
	            $puur=mysqli_real_escape_string($connection, $_POST['puur']);
			    $liik=mysqli_real_escape_string($connection, "pildid/".$_FILES["liik"]["name"]);
			    $query ="INSERT INTO aveinber_loomaaed (nimi, puur, liik ) values ('$nimi','$puur','$liik')";
			    $result = mysqli_query($connection, $query) or die("Ei saanud päringut teha ".mysqli_error($connection));
			   
				header('Location:loomaaed.php?page=loomad');   
			  
		}
	}else{
		include_once('views/loomavorm.html');
		}
	}
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>