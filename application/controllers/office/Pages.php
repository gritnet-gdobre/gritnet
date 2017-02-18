<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pages extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Pages_Model');
			$this->load->library('form_validation');
		}
		
		public function index()
		{
			$data['pages'] = $this->Pages_Model->get_pages();
			$this->load->office_template('office/pages/list', $data);
		}
		
		public function add()
		{
			
			$data['pages'] = $this->Pages_Model->get_pages();
			$this->load->office_template('office/pages/add', $data);
			echo 'ceva';
		}
		
		public function add_page()
		{
			$this->form_validation->set_rules('page_title', 'Page title', 'required');
			$this->form_validation->set_rules('page_content', 'Page content', 'required');
			
			if($this->form_validation->run()===true)
			{
				$this->Pages_Model->add_page();
				$response['status'] = 201;
				$response['url'] = base_url('office/pages');
			}
			else
			{
				$response['status'] = 400;
				$response['errors'] = validation_errors();
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
		}
	}