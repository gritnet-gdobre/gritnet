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
				$query = $this->db->select('t1.page_id, t1.page_parent, t1.page_title, t1.page_slug, t2.page_id, t2.page_title AS page_parent_title')->from('pages t1')->join('pages t2', 't2.page_id=t1.page_parent')->get()->result_array();
			}
			else
			{
				$query = $this->db->select('*')->get_where('pages', array('page_slug' => $slug))->row_array();
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
		
		public function parent_page($page_id)
		{
			
		}
		
		public function listPages()
		{
			$pages = $this->db->select('*')->from('pages')->get()->result_array();
			return $pages;
		}
	}