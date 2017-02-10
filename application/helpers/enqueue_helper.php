<?php

	function office_load_styles()
	{
		$link = '';
		
		$styles = array
		(
			'bootstrap'			=>	'css/bootstrap.min',
			'bootstrap-theme'	=>	'css/bootstrap-theme.min',
			'font-awesome'		=>	'css/font-awesome.min',
			'fixlancer'			=>	'css/office'
		);
		
		foreach($styles as $file=>$path)
		{
			$link .= '<link rel="stylesheet" type="text/css" href="' . base_url() . 'public/' . $path . '.css"/>';
		}
		
		return $link;
	}
	
	function office_load_scripts()
	{
		$script = '';
		
		$scripts = array
		(
			'jquery'			=>	'js/jquery-1.11.1.min',
			'bootstrap'			=>	'js/bootstrap.min'
		);
		
		foreach($scripts as $file=>$path)
		{
			$script .= '<script type="text/javascript" src="' . base_url() . 'public/' . $path . '.js"></script>';
		}
		
		return $script;
	}
	
?>
