<?php

	class Clients extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Clients_Model');
		}
		
		public function index()
		{
			$data['clients'] = $this->Clients_Model->get_clients();
			$this->load->office_template('office/clients/list', $data);
		}
	}