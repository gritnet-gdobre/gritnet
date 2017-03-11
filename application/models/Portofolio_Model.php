<?php

	class Portofolio_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function add_project()
		{
			$data = array
			(
				'project_parent'	=> 	$this->input->post('project_parent'),
				'project_name'		=> 	$this->input->post('project_name')
			);
			
			$this->db->insert('projects', $data);
			
			if($this->db->affected_rows()>0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function get_projects($project_id=null)
		{
			if($project_id===null)
			{
				$query = $this->db->select('project_id, project_parent, project_name, project_date')->from('projects')->order_by('project_date', 'desc')->get()->result();
			}
			else
			{
				$query = $this->db->select('project_id, project_parent, project_name, project_date')->get_where('projects', array('project_id' => $project_id))->row();
			}
			return $query;
		}
		
		public function add_projects_pictures()
		{
			$project_id = $this->input->post('project_id');
			$projects_pictures = $this->input->post('callback_files');
			
			foreach($projects_pictures as $picture)
			{
				
				if(file_exists('../public_html/Public/vendors/jquery-file-upload/9_14_2/server/php/files/thumbnail/' . $picture))
				{
					$data['project_id'] = $project_id;
					$data['ppicture_image_url'] = $picture;
					$data['ppicture_thumb_url'] = $picture;
					$query = $this->db->insert('projects_pictures', $data);
				}
			}
		
			if($this->db->affected_rows()>0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function get_projects_pictures($project_id)
		{
			$query = $this->db->select('ppicture_image_url, ppicture_thumb_url')->order_by('ppicture_date', 'desc')->get_where('projects_pictures', array('project_id' => $project_id))->result();
			return $query;
		}
		
		public function get_categories()
		{
			$query = $this->db->select('gallery_id, gallery_parent, gallery_title')->from('gallery')->get()->result();
			return $query;
		}
	}