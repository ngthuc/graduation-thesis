<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
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
		if(get_status_site_of_user_logged($username)==1) {
			$data['data_subview'] = array(
				'user' => $username,
				'menu_type' => 'primary',
				'menu_style' => 'home',
				'person_info_default' => $this->Musers->getById($username),
				'person_info_customize' => $this->Minfo->getPersonInfoByUser($username),
				'person_research' =>  $this->Mcategory->getSortByParent($username,0,'info','CATEPOSITION','ASC')
			);
			$this->load->view('site_page/themes/'.get_theme_of_user($username).'/main_layout',$data);
		} else {
			echo '<!DOCTYPE html>
			<html>
			<head>
				<title>It work!</title>
				<link rel="stylesheet" type="text/css" href="'.base_url('public/libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css').'">
			</head>
			<body>

			<div class="alert alert-info">
				<p><b>Cán bộ chưa sẵn sàng công bố thông tin</b></p>
			</div>

			</body>
			</html>';
		}
	}

	public function category($username,$idcate) {
		$_page = ($this->Marticle->getPageByCategory($idcate)) ? $this->Marticle->getPageByCategory($idcate) : null;
		$_data['subview'] = 'site_page/themes/'.$this->template.'/blog_category';
		$_data['data_subview'] = array(
			'user' => $username,
			'menu_type' => check_menu_type($username),
			'menu_style' => 'subpage',
			'articles' => $this->Marticle->getByCategory($idcate),
			'page' =>  $_page,
			'category' =>  $this->Mcategory->getById($idcate)
		);
		$this->load->view('site_page/themes/'.get_theme_of_user($username).'/blog_layout',$_data);
	}

	public function article($username,$idcate,$idpost) {
		$_article = $this->Marticle->getById($idpost);
		$_data['subview'] = 'site_page/themes/'.$this->template.'/blog_post';
		$_data['data_subview'] = array(
			'user' => $username,
			'menu_type' => check_menu_type($username),
			'menu_style' => 'subpage',
			'article' => $_article,
			'title' => $_article['ARTICLETITLE'],
			'articles' =>  $this->Marticle->getByCategory($idcate,5,0),
			'category' =>  $this->Mcategory->getById($idcate)
		);
		$this->load->view('site_page/themes/'.get_theme_of_user($username).'/blog_layout',$_data);
	}
}
