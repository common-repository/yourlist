<?php
/*
Plugin Name: yourli.st Reminder
Plugin URI: http://www.skillzdesign.com
Version: 1.0
Author: <a href="http://www.skillzdesign.com" target="_blank">Keith Ratner</a>
Description: Send a yourli.st e-mail reminder for this blog posting
*/

if (!class_exists("KRWPPlugin")) {
	class KRWPPlugin {
		function KRWPPlugin() { //constructor		
		}
		function createYourlistReminder($content) {
		global $yourlistreminderhtml;
		$title = urlencode(get_the_title());
		$permalink = urlencode(get_permalink());
		$imageurl = "http://yourli.st/images/remindme.png";
		$yourlistreminderhtml = "<!--yourlistreminder--><div class=\"reminder\">";
		$yourlistreminderhtml .= "<a href=\"http://yourli.st/?t=$title&s=$permalink\" target=\"_blank\">";
		$yourlistreminderhtml .= "<img title=\"Click here to create a free recipe reminder using yourli.st!\" src=\"$imageurl\" border=\"0\"/>";
		$yourlistreminderhtml .= "</a>";
		$yourlistreminderhtml .= "</div><!--/yourlistreminder-->";		return $content.$yourlistreminderhtml;		
		}
	}
} //End KRWPPlugin Class
if (class_exists("KRWPPlugin")) {
	$kr_plugin = new KRWPPlugin();
}
//Actions and Filters
if (isset($kr_plugin)) {
	//Actions
	
	//Filters
	add_filter('the_content',array(&$kr_plugin, 'createYourlistReminder'));
	
}

?>