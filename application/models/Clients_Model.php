<?php

	class Clients_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_clients($client_id = null)
		{
			return $this->db->select('*, DATE_FORMAT(client_date, \'%d/%m/%Y\') AS client_date, , DATE_FORMAT(client_date, \'%d of %M %Y - %H:%i:%s\') AS client_datetime', false)->from('clients')->get()->result_array();
			
		}
	}