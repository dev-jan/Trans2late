<h1><?php echo $project["name"];?></h1>
<p><?php echo $project["description"];?></p>

<hr />

<h3>Project Values:</h3>
<?php while ($mainvalue = $mainvalues->fetch_assoc()) {?>
	<div><?php echo $mainvalue["key"];?></div>
<?php }?>