<?php 
	
	add_filter('acf/get_field_groups', 'test_get_field_groups', 99);
	add_filter('acf/get_field_group', 'test_get_field_group', 99);
	
	function test_get_field_groups($groups) {
		// group_5633fcd3b5e44
		/*
		$fields = acf_get_fields('group_5633fcd3b5e44');
		//echo '<pre>'; print_r($fields); die;
		$field = array(
			'key' => 'field_testtesttest',
			'label' => 'Local Field',
			'name' => 'local_field',
			'type' => 'text',
			'parent' => 'group_5633fcd3b5e44'
		);
		acf_add_local_field($field);
		foreach ($fields as $field) {
			$field['parent'] = 'group_5633fcd3b5e44';
			acf_add_local_field($field);
		}
		*/
		return $groups;
	}
	
	function test_get_field_group($group) {
		//echo '<pre>'; print_r($group); echo '</pre>';
		return $group;
	}
	
?>