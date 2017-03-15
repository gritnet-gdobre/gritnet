<?php

	class Clients extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Clients_Model');
			$this->load->model('Quotes_Model');
			$this->load->model('Vehicles_Model');
			$this->load->library('form_validation');
		}
		
		public function index()
		{
			$data['clients'] = $this->Clients_Model->get_clients();
			$this->load->office_template('office/clients/list', $data);
		}
		
		public function add()
		{
			$this->load->office_template('office/clients/add');
		}
		
		public function add_client()
		{
			$this->form_validation->set_rules('client_fname', 'First name', 'required');
			$this->form_validation->set_rules('client_lname', 'Last name', 'required');
			$this->form_validation->set_rules('client_email', 'Email address', 'required');
			$this->form_validation->set_rules('client_phone', 'Phone number', 'required');
			
			if($this->form_validation->run()===true)
			{
				$this->Clients_Model->add_client();
				$response['status'] = 201;
				$response['url'] = base_url('office/clients');
			}
			else
			{
				$response['status'] = 400;
				$response['errors'] = validation_errors();
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
		}
		
		public function view($client_id)
		{
			$data['client'] = $this->Clients_Model->get_clients($client_id);
			$data['quotes'] = $this->Quotes_Model->get_quotes($client_id);
			$data['vehicles'] = $this->Vehicles_Model->get_vehicles($client_id);
			$this->load->office_template('office/clients/view', $data);
		}
		
		public function add_vehicle($client_id)
		{
			$this->form_validation->set_rules('vehicle_make', 'Make', 'required');
			$this->form_validation->set_rules('vehicle_model', 'Model', 'required');
			$this->form_validation->set_rules('vehicle_registration', 'Registration', 'required');
			
			if($this->form_validation->run()===true)
			{
				$query = $this->Vehicles_Model->add_vehicle($client_id);
				
				if($query!=false)
				{
					$response['status'] = 200;
					$response['data'] = '<tr><td>' . $query['vehicle_make'] . '</td><td>' . $query['vehicle_model'] . '</td><td>' . $query['vehicle_engine'] . '</td><td>' . $query['vehicle_body'] . '</td><td>' . $query['vehicle_year'] . '</td><td>' . $query['vehicle_registration'] . '</td></tr>';
				}
				else
				{
					$response['status'] = 400;
					$response['errors'] = 'Database error';
				}
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