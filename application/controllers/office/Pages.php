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
		
		public function add()
		{
			$this->load->library('form_validation');
			
			$data['pages'] = $this->Pages_Model->get_pages();
			$this->load->office_template('office/pages/add', $data);
			echo 'ceva';
		}
		
		public function add_page()
		{
			$this->form_validation->set_rules('project_parent', 'Project parent', 'required');
			$this->form_validation->set_rules('project_name', 'Project name', 'required');
			
			if($this->form_validation->run()===true)
			{
				if($this->Portofolio_Model->add_project()===true)
				{
					echo '1';
				}
				else
				{
					echo 'Server error';
				}
			}
			else
			{
				echo validation_errors();
			}
		}
	}