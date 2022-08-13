<?php

$entity = elgg_get_plugin_from_id('elgg_theme');

// Get the image
$img = elgg_get_simplecache_url('graphics/cover.jpg');

$cover = elgg_format_element('div', [
	'class' => 'slide',
	'style' => "background-image: url('{$img}');"
]);

$image = elgg_format_element('div', ['class' => 'elgg-featured-image'], $cover);

$h1 = elgg_format_element('h1', [], $entity->caption_h1);
$h2 = elgg_format_element('h2', [], $entity->caption_h2);

$inner = elgg_format_element('div', ['class' => 'elgg-inner'], $h1 . $h2);
$content = elgg_format_element('div', ['class' => 'elgg-caption'], $inner);

echo elgg_format_element('div', [
	'class' => 'elgg-featured-container'
], $image . $content);
