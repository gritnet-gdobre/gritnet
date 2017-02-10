<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pages extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Pages_Model');
		}
		
		public function index()
		{
			$data['pages'] = $this->Pages_Model->get_pages();
			$this->load->office_template('office/pages/list', $data);
		}
	}