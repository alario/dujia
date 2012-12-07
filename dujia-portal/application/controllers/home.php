<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function index()
	{
		$this->set_template_param( 'subtitle', '我的家' );
		$data['current'] = 'account';
		$data['dashboard'] = $this->load->view('/home/dashboard', $data, TRUE);
		$this->set_template_param('css', '/asset/account.css');
		$this->load_templated_view( 'settings', '/home/account_content', $data );
	}
}