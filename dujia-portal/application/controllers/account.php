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

	public function login_submit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('account', '用户', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		$this->form_validation->set_rules('captcha', '验证码', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			echo "validation error";
			return;
		}

		$account = $this->input->post('account');
		$pwd = $this->input->post('password');
		$captchaKey = $this->input->cookie('captcha-key');
			
		$sql = 'select * from usr_captcha where uuid_key = ?';
		$query = $this->db->query( $sql, $captchaKey );
		if ( $query->num_rows() == 0 )
		{
			$data['account'] = $account;
			$this->set_template_param( 'subtitle', '登录' );
			$this->set_template_param( 'sysmsg', '验证码已失效，请重新登录' );
			$this->load_templated_view( 'login', '/account/login_content', $data );
			return;
		}

		$row = $query->row();
		if ( strcasecmp( $row->answer, $this->input->post('captcha') ) == 0 )
		{
			$regexMobile = '/^\d+$/';
			$regexMail = '/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/';
			$accountType = '';
			if ( preg_match( $regexMobile, $account ) )
			{
				$accountType = 'mobile';
				$sql = 'select * from usr_account where mobile = ?';
			}
			else if ( preg_match( $regexMail, $account ) )
			{
				$accountType = 'mail';
				$sql = 'select * from usr_account where email = ?';
			}
			else
			{
				$accountType = 'name';
				$sql = 'select * from usr_account where user_name = ?';
			}
			$query = $this->db->query( $sql, $account );
			if ( $query->num_rows() == 0 )
			{
				$data['account'] = $account;
				$this->set_template_param( 'subtitle', '登录' );
				$this->set_template_param( 'sysmsg', '账号不存在，请重新输入' );
				$this->load_templated_view( 'login', '/account/login_content', $data );
			}
			else
			{
				$row = $query->row();
				if ( $row->password == $pwd )
				{
					echo 'success';
					$remember = ( $this->input->post('remember') == '1' );
					$this->write_account_ticket( $row->uid, $row->user_name, $row->email, $row->mobile, $remember );
				}
				else
				{
					$data['account'] = $account;
					$this->set_template_param( 'subtitle', '登录' );
					$this->set_template_param( 'sysmsg', '账号或密码错误，请重新输入。如果已绑定手机号，建议用手机号登录。<a href="/account/resetreq">忘记了密码？</a>' );
					$this->load_templated_view( 'login', '/account/login_content', $data );
				}
			}
		}
		else
		{
			$data['account'] = $account;
			$this->set_template_param( 'subtitle', '登录' );
			$this->set_template_param( 'sysmsg', '验证码错误' );
			$this->load_templated_view( 'login', '/account/login_content', $data );
		}
		$this->db->delete('usr_captcha', array('uuid_key' => $captchaKey));

	}


	public function signup()
	{
		$this->set_template_param( 'subtitle', '注册' );
		$this->load_templated_view( 'signup', '/account/signup_content' );
	}


	public function signup_check( $type )
	{
		if ( $type == 'email' )
			$sql = 'select uid from usr_account where email = ?';
		if ( $type == 'name' )
			$sql = 'select uid from usr_account where user_name = ?';
		
		$query = $this->db->query( $sql, $this->input->post('value') );
		echo $query->num_rows();
	}
	
	public function signup_submit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', '邮箱', 'required');
		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			echo "validation error";
			return;
		}
		$captchaKey = $this->input->cookie('captcha-key', '');
		$data['email'] = $this->input->post('email');
		$data['name'] = $this->input->post('username');
		if ( !isset( $captchaKey ) || $captchaKey == '' )
		{
			$this->set_template_param( 'subtitle', '注册' );
			$this->set_template_param( 'sysmsg', '验证码已失效，请重新注册' );
			$this->load_templated_view( 'signup', '/account/signup_content', $data );
			return;
		}
			
		$sql = 'select * from usr_captcha where uuid_key = ?';
		$query = $this->db->query( $sql, $captchaKey );
		if ( $query->num_rows() == 0 )
		{
			$this->set_template_param( 'subtitle', '注册' );
			$this->set_template_param( 'sysmsg', '验证码已失效，请重新注册' );
			$this->load_templated_view( 'signup', '/account/signup_content', $data );
			return;
		}
		
		$row = $query->row();
		if ( strcasecmp( $row->answer, $this->input->post('captcha') ) == 0 )
		{
			$insertion = array(
					'email' => $this->input->post('email'),
					'user_name' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'email_verification' => 2
			);
			$inserted = $this->db->insert( 'usr_account', $insertion );
			$uid = $this->db->insert_id();
			/*
			$user_name = $this->input->post('user_name');
			$email = $this->input->post('email');
			$this->write_account_ticket($uid, $user_name, $email, '', FALSE);
			*/

			$data['email'] = $this->input->post('email');
			$this->load->helper('string');
			$code = random_string( 'sha1', 64 );
			$insertion = array(
					'uid' => $uid,
					'email' => $data['email'],
					'code' => $code
					);
			$inserted = $this->db->insert( 'usr_mailcode', $insertion );

			$this->load->helper('url');
			$verifyUrl = base_url("/account/signup_verify/".$uid."?c=".urlencode($code));
			
			$this->load->library('parser');
			
			$maildata = array(
					'url' => $verifyUrl
			);
			$mailMessage = $this->parser->parse('/account/mail_verification', $maildata, TRUE);
			
			$this->load->library('email');
			
			$this->email->from('alario@126.com', '度假网');
			$this->email->to( $data['email'] );
			
			$this->email->subject('感谢注册度假网，请验证Email');
			$this->email->message($mailMessage);
			
			$this->email->send();
			
			$this->set_template_param( 'subtitle', '验证邮箱' );
			$this->set_template_param( 'css', '/asset/account.css' );
			$this->load_templated_view( 'signuped', '/account/signup_next_content', $data );
		}
		else
		{
			$this->set_template_param( 'subtitle', '注册' );
			$this->set_template_param( 'sysmsg', '验证码错误' );
			$this->load_templated_view( 'login', '/account/signup_content', $data );
		}
		$this->db->delete('usr_captcha', array('uuid_key' => $captchaKey));
	}
	
	public function signup_verify( $uid )
	{
		$c = $this->input->get( "c", TRUE );
		$sql = 'select * from usr_mailcode where uid = ?';
		$query = $this->db->query( $sql, $uid );
		if ( $query->num_rows() == 0 )
		{
			echo "NO";
			return;
		}
		
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