<?php
/**
 * Elgg Connect featured module
 * @package elgg_connect
 * 
 */
 
$plugin = elgg_get_plugin_from_id('elgg_connect');

// Get the image
$img = elgg_get_simplecache_url('graphics/featured.jpg');

?>

<div class="elgg-featured-container">
	<div class="elgg-featured">
		<div class="featured-image">
			<?php 				
				echo "<div class=\"slide\" style=\"
					background-image: url(" . $img . ");
					background-repeat: no-repeat; 
					background-position: center center;
					background-size: cover;
				\"></div>";
			?>
		</div>
		<div class="ez-caption">
			<div class="elgg-inner">			
				<h1><?php echo $plugin->caption_h1; ?></h1>
				<h2><?php echo $plugin->caption_h2; ?></h2>
			</div>
		</div>
	</div>
</div>
