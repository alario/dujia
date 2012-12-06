<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.126.com';
$config['smtp_user'] = 'alario';
$config['smtp_pass'] = '9830tcli';
$config['mailtype'] = 'html';


/*
 * protocol	mail	mail, sendmail, or smtp	The mail sending protocol.
 * smtp_host	No Default	None	SMTP Server Address.
 * smtp_user	No Default	None	SMTP Username.
 * smtp_pass	No Default	None	SMTP Password.
 * smtp_port	25	None	SMTP Port.
 * smtp_timeout	5	None	SMTP Timeout (in seconds).
 * mailtype	text	text or html	Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
 * 
 */