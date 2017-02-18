<?php

	function get_website_title($subtitle = null)
	{
		$CI =& get_instance();
		$query = $CI->db->get_where('settings', array('setting_code' => 'website_title'));
		$result = $query->row();
		if($subtitle==null)
		{
			return $result->setting_value;
		}
		else
		{
			return $subtitle . ' | ' . $result->setting_value;
		}
	}
	
	function get_social($string)
	{
		
	}