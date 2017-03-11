<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Portofolio extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Portofolio_Model');
		}
		public function index()
		{
			$data['projects'] = $this->Portofolio_Model->get_projects();
			$this->load->office_template('office/portofolio/list', $data);
		}
		
		public function add()
		{
				$data['projects'] = $this->Portofolio_Model->get_categories();
				$this->load->office_template('office/portofolio/add', $data);
		}
		
		public function add_project()
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
		
		public function view($project_id)
		{
			$data['project'] = $this->Portofolio_Model->get_projects($project_id);
			$data['project_pictures'] = $this->Portofolio_Model->get_projects_pictures($project_id);
			$this->load->office_template('office/portofolio/view', $data);
		}
		
		public function add_project_pictures()
		{
			if($this->Portofolio_Model->add_projects_pictures()===true)
			{
				echo '1';
			}
			else
			{
				echo 'Server error';
			}
		}
	}
	
?>