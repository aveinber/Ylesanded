<?php require_once('header.html');
$pildid = array(
		1=>array('src'=>"nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('src'=>"nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('src'=>"nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('src'=>"nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('src'=>"nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('src'=>"nameless6.jpg", 'alt'=>"nimetu 6"),
	);

?>
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
	<?php $i=1;?>
    <?php foreach($pildid as $pilt){ ?>
	<p>
	<label for="p<?php echo $i; ?>">
	<img src="<?php echo $pilt['src'];?>" alt="<?php echo $pilt['alt'];?>" height="100"/>
	</label>
	<input type="radio" value="<?php echo $i; ?>" id="p<?php echo $i; ?>" name="pilt" />
	</p>
	<?php ($i++);?>
    <?php } ?>
	
		<input type="submit" value="Valin!"/>
	</form>
	<?php require_once('footer.html');?>


