<?php

	class Vehicles_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_vehicles($client_id = null)
		{
			return $this->db->select('*')->get_where('vehicles', array('client_id' => $client_id))->result_array();
		}
		
		public function add_vehicle($client_id = null)
		{
			$vehicle = array
			(
				'client_id'				=>	$client_id,
				'vehicle_make'			=>	$this->input->post('vehicle_make'),
				'vehicle_model'			=>	$this->input->post('vehicle_model'),
				'vehicle_engine'		=>	$this->input->post('vehicle_engine'),
				'vehicle_body'			=>	$this->input->post('vehicle_body'),
				'vehicle_year'			=>	$this->input->post('vehicle_year'),
				'vehicle_registration'	=>	$this->input->post('vehicle_registration')
			);
			
			try
			{
				$this->db->insert('vehicles', $vehicle);
				return true;
			}
			catch(Exception $ex)
			{
				return false;
			}
		}
	}
	
?>