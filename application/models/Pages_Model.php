<?php

	class Pages_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_pages($slug = null)
		{
			if($slug==null)
			{
				$query = $this->db->select('t1.page_id, t1.page_parent, t1.page_title, t2.page_id, t2.page_title AS page_parent_title')->from('pages t1')->join('pages t2', 't2.page_id=t1.page_parent')->get()->result_array();
			}
			else
			{
				$query = $this->db->select('*')->get_where('pages', array('page_slug' => $slug))->result_array();
			}
			
			return $query;
		}
		
		public function createPage()
		{
			$page = array
			(
				'page_parent' 	=> 	$this->input->post('page_parent'),
				'page_title' 	=>	$this->input->post('page_title'),
				'page_slug' 	=>	$this->input->post('page_slug'),
				'page_content' 	=>	$this->input->post('page_content'),
				'page_status' 	=>	$this->input->post('page_status')
			);
			
			$query = $this->db->insert('pages', $page);
		}
		
		public function listPages()
		{
			$pages = $this->db->select('*')->from('pages')->get()->result_array();
			return $pages;
		}
	}