<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->_theme = get_media('theme','theme');
		$this->template = 'basic_template';
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		echo '<!DOCTYPE html>
		<html>
		<head>
			<title>403 Forbidden</title>
		</head>
		<body>

		<p>Directory access is forbidden.</p>

		</body>
		</html>';
	}

	public function user($username) {
		$data['data_subview'] = array(
			'person_info' => $this->Minfo->getPersonInfoByUser($username),
			'person_research' =>  $this->Minfo->getScienceResearhByUser($username)
		);
		$this->load->view('site_page/themes/'.$this->template.'/main_layout',$data);
		// var_dump($data);
	}
}
