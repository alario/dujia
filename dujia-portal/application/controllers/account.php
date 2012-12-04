<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function logout()
	{
		$this->load->helper('url');
		$this->clear_account_ticket();
		redirect( '/' );
	}
	
	public function login()
	{
		$this->set_template_param( 'subtitle', '登录' );
		$this->load_templated_view( 'login', '/account/login_content' );
	}
	
	public function signup()
	{
		$this->set_template_param( 'subtitle', '注册' );
		$this->load_templated_view( 'signup', '/account/signup_content' );
	}
	
	public function signup_checkemail( $email )
	{
		$sql = 'select uid from usr_account where email = ?';
		$query = $this->db->query( $sql, $email );
		echo $query->num_rows();
	}
	
	public function mobile_signup()
	{
		$this->set_template_param( 'subtitle', '注册' );
		$this->load_templated_view( 'signup', '/account/mobile_signup_content' );
	}
	
	public function mobile_signup_checkmobile( $num )
	{
		$sql = 'select uid from usr_account where mobile = ?';
		$query = $this->db->query( $sql, $num );
		echo $query->num_rows();
	}
	
	public function mobile_signup_sms( $num )
	{
		$sql = 'select uid from usr_account where mobile = ?';
		$query = $this->db->query( $sql, $num );
		if ( $query->num_rows() != 0 )
		{
			echo 'mobile already exists';
			return;
		}
		$code = rand( 100000, 999999 );

		$insertion = array(
				'mobile' => $num,
				'code' => $code
		);
		$this->db->insert( 'usr_smscode', $insertion );
		echo 'ok';
	}
	
	public function mobile_signup_submit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('signup_mobile', '手机号', 'required');
		$this->form_validation->set_rules('signup_verify_code', '短信验证码', 'required');
		$this->form_validation->set_rules('signup_password', '密码', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			echo "validation error";
		}
		else
		{
			$sql = 'select id from usr_smscode where mobile = ? and code = ?';
			$params = array(
					$this->input->post('signup_mobile'),
					$this->input->post('signup_verify_code')
					);
			$query = $this->db->query( $sql, $params );
			if ( $query->num_rows() == 0 )
			{
				echo 'code error';
				return;
			}
			$row = $query->row();
			$code_id = $row->id;
			
			$insertion = array(
					'mobile' => $this->input->post('signup_mobile'),
					'password' => $this->input->post('signup_password')
					);
			$inserted = $this->db->insert( 'usr_account', $insertion );
			$uid = $this->db->insert_id();
			$sql = 'delete from usr_smscode where id = ?';
			$this->db->query( $sql, $code_id );
			$this->write_account_ticket( $uid, '', '', $this->input->post('signup_mobile'), FALSE);
			echo 'ok';
		}
	}
	
}