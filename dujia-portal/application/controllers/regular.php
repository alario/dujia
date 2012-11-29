<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regular extends MY_Controller {

	public function index()
	{
		$sql = 'select * from dj_regular order by rid desc';
		$query = $this->db->query( $sql );
		$result = $query->result();
		$data['regulars'] = $result;
		// $data['my_trace_var'] = $result;
		$this->load_default_template_view( 'regular/index_content', $data );
		
// 		$dj_data['djview_content'] = $this->load->view( 'regular/index_content', $data, TRUE );
// 		$dj_data['djview_sidebar'] = $this->load->view( 'templates/sidebar', $data, TRUE );
// 		$this->load->view( 'templates/default', $dj_data );
		
// 		$this->load->vars( $data );
// 		$this->load->view( 'templates/header' );
// 		$this->load->view( 'regular/index_content' );
// 		$this->load->view( 'templates/sidebar' );
// 		$this->load->view( 'templates/footer' );
	}
	
	public function show( $rid )
	{
		$sql = "select * from dj_regular where rid = {$rid}";
		$query = $this->db->query( $sql );
		$data['item'] = $query->result();

		$this->load_default_template_view( 'regular/show_content', $data );
	}
}