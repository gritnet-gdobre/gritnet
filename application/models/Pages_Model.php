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
				$query = $this->db->query('SELECT t1.page_id, t1.page_title, t1.page_parent, t1.page_slug, t2.page_title AS page_parent_title FROM pages AS t1 LEFT JOIN pages AS t2 ON t2.page_id=t1.page_parent')->result_array();
			}
			else
			{
				$query = $this->db->select('*, DATE_FORMAT(page_created, \'%d/%m/%Y\') AS page_created, DATE_FORMAT(page_modified, \'%d/%m/%Y\') AS page_modified')->get_where('pages', array('page_slug' => $slug))->row_array();
			}
			
			return $query;
		}
		
		public function add_page()
		{
			if(empty($this->input->post('page_parent')))
			{
				$page_parent = NULL;
			}
			else
			{
				$page_parent = $this->input->post('page_parent');
			}
			
			if(empty($this->input->post('page_template')) || $this->input->post('page_template')==0)
			{
				$page_template = NULL;
			}
			else
			{
				$page_template = $this->input->post('page_template');
			}
			
			if(empty($this->input->post('page_order')) || $this->input->post('page_order')==0 || !is_numeric($this->input->post('page_order')))
			{
				$page_order = 0;
			}
			else
			{
				$page_order = $this->input->post('page_order');
			}
			
			$page = array
			(
				'page_parent' 	=> 	$page_parent,
				'page_title' 	=>	$this->input->post('page_title'),
				'page_slug' 	=>	slugify($this->input->post('page_title')),
				'page_content' 	=>	$this->input->post('page_content'),
				'page_template'	=>	$page_template,
				'page_order'	=>	$page_order,
				'page_status' 	=>	'1'
			);
			
			$query = $this->db->insert('pages', $page);
		}
		
		public function update_page()
		{
			
			if(empty($this->input->post('page_parent')))
			{
				$page_parent = NULL;
			}
			else
			{
				$page_parent = $this->input->post('page_parent');
			}
			
			if(empty($this->input->post('page_template')) || $this->input->post('page_template')==0)
			{
				$page_template = NULL;
			}
			else
			{
				$page_template = $this->input->post('page_template');
			}
			
			if(empty($this->input->post('page_order')) || $this->input->post('page_order')==0 || !is_numeric($this->input->post('page_order')))
			{
				$page_order = 0;
			}
			else
			{
				$page_order = $this->input->post('page_order');
			}
			
			$page = array
			(
				'page_parent' 	=> 	$page_parent,
				'page_title' 	=>	$this->input->post('page_title'),
				'page_slug' 	=>	slugify($this->input->post('page_title')),
				'page_content' 	=>	$this->input->post('page_content'),
				'page_template'	=>	$page_template,
				'page_order'	=>	$page_order,
				'page_modified' =>	date('Y-m-d H:i:s'),
				'page_status' 	=>	'1'
			);
			
			/*
			* Run update query
			*/
			
			$this->db->where('page_id', $this->input->post('page_id'))->update('pages', $page);
			
			if($this->db->affected_rows()==1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function parent_page($page_id)
		{
			$query = $this->db->get_where('pages', array('page_id' => $page_id))->get()->row_array();
			return $query;
		}
		
		public function listPages()
		{
			$pages = $this->db->select('*')->from('pages')->get()->result_array();
			return $pages;
		}
	}