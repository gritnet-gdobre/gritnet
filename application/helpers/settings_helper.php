<?php

	function get_website_title()
	{
		$CI =& get_instance();
		$query = $CI->db->get_where('settings', array('setting_code' => 'website_title'));
		$result = $query->row();
		return $result->setting_value;
	}
	
	function get_social($string)
	{
		
	}