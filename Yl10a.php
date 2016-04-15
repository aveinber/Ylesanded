<?php
session_start();
if (isset($_POST["submit"])) {
	$_SESSION["text"] = $_POST["text"];
	$_SESSION["backcolor"] = $_POST["backcolor"];
	$_SESSION["textcolor"] = $_POST["textcolor"];
	$_SESSION["bordercolor"] = $_POST["bordercolor"];
	$_SESSION["borderstyle"] = $_POST["borderstyle"];
	$_SESSION["borderwidth"] = $_POST["borderwidth"];
	$_SESSION["radius"] = $_POST["radius"];
}
if (isset($_POST["submit2"])) {
	$_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
}

 $text=""; // tekst
if (isset($_POST['text']) && $_POST['text']!="") {
    $bgcol=htmlspecialchars($_POST['backcolor']);
}
 $bgcol="#fff"; // taustavärv
if (isset($_POST['backcolor']) && $_POST['backcolor']!="") {
    $bgcol=htmlspecialchars($_POST['backcolor']);
}
 $textcol="#fff"; // tekstivärv
if (isset($_POST['textcolor']) && $_POST['textcolor']!="") {
    $textcol=htmlspecialchars($_POST['textcolor']);
}
 $borcol="#fff"; // piirjoonevärv
if (isset($_POST['bordercolor']) && $_POST['bordercolor']!="") {
    $borcol=htmlspecialchars($_POST['bordercolor']);
}
 $borstyle="solid"; // piirjoonestiil
if (isset($_POST['borderstyle']) && $_POST['borderstyle']!="") {
    $borstyle=htmlspecialchars($_POST['borderstyle']);
}
 $borwidth="3"; // piirjoone laius
if (isset($_POST['borderwidth']) && $_POST['borderwidth']!="") {
    $borwidth=htmlspecialchars($_POST['borderwidth']);
}
 $borrad="10"; // piirjoone raadius
if (isset($_POST['radius']) && $_POST['radius']!="") {
    $borrad=htmlspecialchars($_POST['radius']);
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Yl10a</title>
	
    <style type="text/css">

        #sisend { background: <?php echo $bgcol; ?>;
            color: <?php echo $textcol; ?>;
			border-color:<?php echo $borcol; ?>;
			border-style: <?php echo $borstyle; ?>;
            border-width: <?php echo $borwidth; ?>px;
            border-radius: <?php echo $borrad; ?>px;
            padding:15px;
            min-height:150px;
            max-width: 600px;
        }

    </style>
   </head>
  <body>
   <?php 

    $stiilid=array("solid", "dashed", "dotted", "none", "double");

    ?>
  
  <div id="sisend"><?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></div>
  <hr/>
  <form method="POST" action="Yl10a.php" >
    <fieldset>		
    
	<h4> Kirjuta tekst ja tee valikud: </h4>
   
    <textarea name="text" placeholder="Siia tekst"><?php if (isset($_SESSION["text"])) echo ($_SESSION["text"]); ?></textarea></br>
	
	<input type="color" name="backcolor" value=<?php if (isset($_SESSION["backcolor"])) echo ($_SESSION["backcolor"]); ?>>Vali tausta värvus</br>
	
	<input type="color" name="textcolor" value=<?php if (isset($_SESSION["textcolor"])) echo ($_SESSION["textcolor"]); ?> >Vali teksti värvus</br>
	
	<input type="color" name="bordercolor" value=<?php if (isset($_SESSION["bordercolor"])) echo ($_SESSION["bordercolor"]); ?> >Vali piirjoone värvus</br>
	<select name="borderstyle" >
	            <option selected="true"><?php if (isset($_SESSION["borderstyle"])) echo ($_SESSION["borderstyle"]); ?></option>
                <?php foreach($stiilid as $stiil):?>
                    <option ><?php echo $stiil; ?></option>
                <?php endforeach; ?>
    </select>Vali piirjoone stiil</br>
	
	<input type="number" name="borderwidth" max="10" min="1" step="1" value=<?php if (isset($_SESSION["borderwidth"])) echo ($_SESSION["borderwidth"]); ?>>Vali piirjoone laius</br>
	
	<input type="number" name="radius" max="30" min="1" step="1" value=<?php if (isset($_SESSION["radius"])) echo ($_SESSION["radius"]); ?>>Vali piirjoone raadius nurkades</br>
	</fieldset>
	
	<input type="submit" name="submit" value="Esita"/>
	<input type="submit" name="submit2" value="Algseis"/>
	
  
  </form>
  
     
  </body>
</html>