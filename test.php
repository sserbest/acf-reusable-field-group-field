<?php 
	
	add_filter('acf/get_field_groups', 'test_get_field_groups', 99);
	add_filter('acf/get_field_group', 'test_get_field_group', 99);
	
	function test_get_field_groups($groups) {
		//global $acf_local;
		//echo '<pre>'; print_r(acf_local()->parents); print_r(acf_local()->fields); die;
		return $groups;
	}
	
	function test_get_field_group($group) {
		//echo '<pre>'; print_r($group); echo '</pre>';
		return $group;
	}
	
?>