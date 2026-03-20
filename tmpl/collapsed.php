<?php 
// No direct access
defined('_JEXEC') or die; 
?>
<?php if(count($badges)>0) : ?>
<ul class="mod-socialbadges nav navbar-nav menu<?php echo $moduleclass_sfx;?>">

	<?php foreach ($badges as $type=>$badge) : ?>
		<li><a href="<?php echo $badge["url"]; ?>" target="_blank" rel="noopener"><span class="badge-2x badge-<?php echo $type; ?>"> </span><span class="badge-title"><?php echo $badge["title"]; ?></span></a></li>
<?php endforeach ?>
	</ul>
	<div class="clearfix"></div>
<?php endif ?>