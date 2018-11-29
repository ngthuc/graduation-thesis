<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->template = get_system('theme','theme');
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
			'user' => $username,
			'person_info' => $this->Minfo->getPersonInfoByUser($username),
			'person_research' =>  $this->Minfo->getScienceResearhByUser($username)
		);
		$this->load->view('site_page/themes/'.$this->template.'/main_layout',$data);
		// $data = $this->Minfo->getPersonInfoByUser($username);
		// foreach ($data as $key => $value) {
		// 	// code...
		// 	// $sql_query = "UPDATE `INFO` SET `MEDIAEMBEDDEDLINK`='$value' WHERE `MEDIATITLE`='$key';";
		// 	// $this->db->query($sql_query);
		// 	var_dump($data[$key]);
		// }
		// var_dump($data);
	}

	public function category($username,$idcate) {
		// $this->_data['base_url'] = base_url() . ($this->lang->line('article')) . '/' . ($this->lang->line('category')).'/'.$category;
		// $this->_data['limit_per_page'] = get_media('theme','limit_per_page');
		// $this->_data['uri_segment'] = 4;
		// $this->_data['total_records'] = $this->Mposts->getNumRowsByCategory($id);
		// $this->_data['start_index'] = ($this->uri->segment(4)) ? (($this->_data['limit_per_page'])*($this->uri->segment(4)-1)) : 0;

		// $data_articles = $this->Mposts->getByCategory($id, $this->_data['limit_per_page'], $this->_data['start_index']);
		$data_articles = $this->Marticle->getByCategory($idcate);

		// $_articles = $this->Mposts->getByCategory($id);
		$_categoryname = $this->Mcategory->getArticleCateNameById($idcate);
		$_page = ($this->Marticle->getPageByCategory($idcate)) ? $this->Marticle->getPageByCategory($idcate) : null;
		$this->_data['articles'] = $data_articles;
		$this->_data['page'] = $_page;
		$this->_data['category_name'] = $_categoryname['CATENAME'];
		$this->load->view('site_page/themes/'.$this->template.'/blog_category',$this->_data);
	}

	public function article($username,$article) {
		$id = $this->Marticle->findId($user,$article);
		$cateid = $this->Marticle->findCategory($user,$article);
		$_article = $this->Marticle->getById($id);
		$_articles = $this->Marticle->getByCategory($cateid,5,0);

		// $this->_data['base_url'] = null;
		// $this->_data['limit_per_page'] = null;
		// $this->_data['uri_segment'] = null;
		// $this->_data['start_index'] = null;
		// $this->_data['total_records'] = null;

		// $this->_data['title'] = $this->_data['article']['ARTICLETITLE'];
		// $this->_data['datasubview'] = array(
		//   'article' => $this->_data['article'],
		//   'articles' => $this->_data['articles']
		// );
		$this->_data['title'] = $_article['ARTICLETITLE'];
		$this->_data['article'] = $_article;
		$this->_data['articles'] = $_articles;
		$this->load->view('mp_site/themes/'.$this->_theme.'/blog_post',$this->_data);


		$id = $this->Mcategory->findId($username,$category);

		// $this->_data['base_url'] = base_url() . ($this->lang->line('article')) . '/' . ($this->lang->line('category')).'/'.$category;
		// $this->_data['limit_per_page'] = get_media('theme','limit_per_page');
		// $this->_data['uri_segment'] = 4;
		// $this->_data['total_records'] = $this->Mposts->getNumRowsByCategory($id);
		// $this->_data['start_index'] = ($this->uri->segment(4)) ? (($this->_data['limit_per_page'])*($this->uri->segment(4)-1)) : 0;

		// $data_articles = $this->Mposts->getByCategory($id, $this->_data['limit_per_page'], $this->_data['start_index']);
		$data_articles = $this->Marticle->getByCategory($id);

		// $_articles = $this->Mposts->getByCategory($id);
		$_categoryname = $this->Mcategory->getArticleCateNameById($id);
		$_page = ($this->Marticle->getPageByCategory($id)) ? $this->Marticle->getPageByCategory($id) : null;
		$this->_data['articles'] = $data_articles;
		$this->_data['page'] = $_page;
		$this->_data['category_name'] = $_categoryname['CATENAME'];
		$this->load->view('site_page/themes/'.$this->template.'/blog_category',$this->_data);
	}
}
