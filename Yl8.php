<?php
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
    <title>Yl8</title>
	
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
  <div id="sisend"><?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></div>
  <hr/>
  <form method="POST" action="Yl8.php" >
    <fieldset>		
    
	<h4> Kirjuta tekst ja tee valikud: </h4>
   
    <textarea name="text" name="name" placeholder="Siia tekst"></textarea></br>
	
	<input type="color" name="backcolor" value="#00CED1">Vali tausta värvus</br>
	
	<input type="color" name="textcolor" value="#000000" >Vali teksti värvus</br>
	
	<input type="color" name="bordercolor" value="#ff0000" >Vali piirjoone värvus</br>
	
	<select name="borderstyle">
       <option value="solid">Solid</option>
       <option value="dashed">Dashed</option>
       <option value="dotted">Dotted</option>
	   <option value="none">None</option>
    </select>Vali piirjoone stiil</br>
	
	<input type="number" name="borderwidth" max="10" min="1" step="1"/>Vali piirjoone laius</br>
	
	<input type="number" name="radius" max="30" min="1" step="1"/>Vali piirjoone raadius nurkades</br>
	</fieldset>
	
	<input type="submit" value="Esita"/>
	
  
  </form>
  
     
  </body>
</html>