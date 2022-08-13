define(['jquery', 'elgg'], function ($, elgg) {
	elgg.provide('elgg.settings');
	
	elgg.settings.landing_action = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-landing-action').show();
		} else {
			$('#settings-landing-action').hide();
		}
	};
	
	elgg.settings.display_members = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-display-members').show();
		} else {
			$('#settings-display-members').hide();
		}
	};
	
	elgg.settings.display_groups = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-display-groups').show();
		} else {
			$('#settings-display-groups').hide();
		}
	};
	
	elgg.settings.activity_sidebar = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-activity-sidebar').show();
		} else {
			$('#settings-activity-sidebar').hide();
		}
	};
});
