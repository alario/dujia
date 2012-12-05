<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->template_params = array();
		$ticket_cookie = $this->input->cookie( 'ticket' );
		if ( isset( $ticket_cookie ) && $ticket_cookie != '' )
		{
			$this->load->library('encrypt');
			$json = $this->encrypt->decode( $ticket_cookie );
			$ticket = json_decode( $json, TRUE );
			if ( isset( $ticket ) )
			{
				$this->set_template_param( 'ticket', $ticket );
			}
		}
	}

	private $template_params;

	function set_template_param( $name, $value )
	{
		$this->template_params[ $name ] = $value;
	}

	function write_account_ticket( $uid, $user_name, $email, $mobile, $remember )
	{
		$this->load->library('encrypt');
		$ticket = array(
				'id' => $uid,
				'un' => $user_name,
				'em' => $email,
				'mb' => $mobile
		);
		$expire = '0';
		if ( $remember )
			$expire = '1000000';
		$cookie = array(
				'name'   => 'ticket',
				'value'  => $this->encrypt->encode( json_encode( $ticket ) ),
				'expire' => $expire
		);
		$this->input->set_cookie( $cookie );
		$this->set_template_param( 'ticket', $ticket );
	}

	function clear_account_ticket()
	{
		$cookie = array(
				'name'   => 'ticket',
				'value'  => '',
				'expire' => '-1'
		);
		$this->input->set_cookie( $cookie );
		$this->set_template_param( 'ticket', NULL );
	}

	function load_templated_view( $bodyid, $content, $data = '' )
	{
		$dj_data['bodyId'] = $bodyid;
		$dj_data['content'] = $this->load->view( $content, $data, TRUE );
		foreach ( $this->template_params as $key => $value )
		{
			$dj_data[$key] = $value;
		}
		$this->load->view( 'templates/default', $dj_data );
	}

	function load_default_template_view( $content, $data )
	{
		$dj_data['bodyId'] = 'index';
		$dj_data['content'] = $this->load->view( $content, $data, TRUE );
		$dj_data['sidebar'] = $this->load->view( 'templates/sidebar', $data, TRUE );
		foreach ( $this->template_params as $key => $value )
		{
			$dj_data[$key] = $value;
		}
		$this->load->view( 'templates/default', $dj_data );
	}
}