<?php

	function breadcrumbs($separator = ' » ', $home = 'Home', $trail = false) 
	{
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
		$base_url = substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')) . '://' . $_SERVER['HTTP_HOST'] . '/';
		$breadcrumbs = array('<li><a href="' . $base_url . '">' . $home . '</a></li>');
		$path_parts = count($path);
		$tmp = array_keys($path);
		$last = end($tmp);
		$i = 0;
		$url = '';
		
		foreach($path as $key=>$value)
		{
			$i++;
			
			if($i==$path_parts)
			{
				array_push($breadcrumbs, '<li>' . ucfirst($value) . '</li>');
			}
			else
			{
				$url .= $path[$key] . '/';
				array_push($breadcrumbs, '<li><a href="' . base_url() . rtrim($url, '/') . '">' . ucfirst($value) . '</a></li>');
			}
		}
		return '<ol class="breadcrumb">' . implode('', $breadcrumbs) . '</ol>';
	}
	
?>