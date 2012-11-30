<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function index()
	{
		$sql = 'select * from dj_regular order by rid desc';
		$query = $this->db->query( $sql );
		$result = $query->result();
		$data['regulars'] = $result;
		// $data['my_trace_var'] = $result;
		$this->load_default_template_view( 'regular/index_content', $data );
	}
	
	public function signup()
	{
		$this->load_templated_view( 'signup', '/account/signup_content' );
	}
	
	public function mobile_signup()
	{
		$this->load_templated_view( 'signup', '/account/mobile_signup_content' );
	}
	
	public function mobile_signup_checkmobile( $num )
	{
		$sql = 'select uid from dj_account where mobile = ?';
		$query = $this->db->query( $sql, $num );
		echo $query->num_rows();
	}
	
	public function mobile_signup_submit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			
	
		}
		else
		{
			
		}
	}
	
	public function set_news()
	{
		$this->load->helper('url');
	
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
	
		$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
		);
	
		return $this->db->insert('news', $data);
	}
}