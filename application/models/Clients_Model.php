<?php

	class Clients_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_clients($client_id = null)
		{
			if($client_id===null)
			{
				return $this->db->select('*, DATE_FORMAT(client_date, \'%d/%m/%Y\') AS client_date, , DATE_FORMAT(client_date, \'%d of %M %Y - %H:%i:%s\') AS client_datetime', false)->from('clients')->get()->result_array();
			}
			else
			{
				return $this->db->select('*, DATE_FORMAT(client_date, \'%d/%m/%Y\') AS client_date, , DATE_FORMAT(client_date, \'%d of %M %Y - %H:%i:%s\') AS client_datetime', false)->get_where('clients', array('client_id' => $client_id))->row_array();
			}
		}
		
		public function add_client()
		{
			$client = array
			(
				'client_fname'	=>	$this->input->post('client_fname'),
				'client_lname'	=>	$this->input->post('client_lname'),
				'client_email'	=>	$this->input->post('client_email'),
				'client_phone'	=>	$this->input->post('client_phone')
			);
			
			try
			{
				$this->db->insert('clients', $client);
				return true;
			}
			catch(Exception $ex)
			{
				return false;
			}
		}
	}