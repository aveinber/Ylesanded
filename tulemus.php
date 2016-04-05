<?php require_once('header.html');
?>
	<h3>Valiku tulemus</h3>
	<p> 
		<?php if ( isset($_GET["pilt"]) && !empty($_GET["pilt"])) {?> Kasutaja valis pildi nr : 
		<?php echo htmlspecialchars($_GET["pilt"]);
	    }else echo " Kasutaja ei valinud pilti"; ?>
    </p>
       
<?php require_once('footer.html');?>
