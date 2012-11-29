<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function load_default_template_view( $content, $data )
	{
		$dj_data['djview_content'] = $this->load->view( $content, $data, TRUE );
		$dj_data['djview_sidebar'] = $this->load->view( 'templates/sidebar', $data, TRUE );
		if ( isset( $data['my_trace_var'] ) )
			$dj_data[ 'my_trace_var' ] = $data['my_trace_var'];
		
		$this->load->view( 'templates/default', $dj_data );
	}
}