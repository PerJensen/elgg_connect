<?php

$activity_enable = elgg_is_active_plugin('activity');

$user = elgg_get_logged_in_user_entity();

if (elgg_is_logged_in() && $activity_enable) {
	$exception = new \Elgg\Exceptions\HttpException();
	$exception->setRedirectUrl(elgg_generate_url('default:river'));
	throw $exception;
} else if (elgg_is_logged_in() && !$activity_enable) {
	$title = elgg_echo('welcome:user', [$user->getDisplayName()]);
	
	echo elgg_view_page(null, [
		'title' => $title,
		'content' => elgg_echo('index:content'),
		'sidebar' => false,
		'filter' => false,
	]);
}  else {
	elgg_push_context('elgg_theme');
	$class = ['class' => 'elgg-landing-page'];

	$body = elgg_view_layout('front_page');
	echo elgg_view_page(null, $body, 'default', ['body_attrs' => $class]);
}
