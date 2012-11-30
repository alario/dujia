<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->template_params = array();
	}
	
	private $template_params;
	
	function set_template_param( $name, $value )
	{
		$this->template_params[ $name ] = $value;
	}
	
	function load_templated_view( $bodyid, $content, $data = '' )
	{
		$dj_data['my_djview_bodyid'] = $bodyid;
		$dj_data['my_djview_content'] = $this->load->view( $content, $data, TRUE );
		if ( isset( $data['my_trace_var'] ) )
			$dj_data[ 'my_trace_var' ] = $data['my_trace_var'];
		foreach ( $this->template_params as $key => $value )
		{
			$dj_data[$key] = $value;
		}
		$this->load->view( 'templates/default', $dj_data );
	}
	
	function load_default_template_view( $content, $data )
	{
		$dj_data['my_djview_bodyid'] = 'index';
		$dj_data['my_djview_content'] = $this->load->view( $content, $data, TRUE );
		$dj_data['my_djview_sidebar'] = $this->load->view( 'templates/sidebar', $data, TRUE );
		if ( isset( $data['my_trace_var'] ) )
			$dj_data[ 'my_trace_var' ] = $data['my_trace_var'];
		
		$this->load->view( 'templates/default', $dj_data );
	}
}