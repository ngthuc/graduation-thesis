<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
    }

    public function index() {
      //code
      echo '<title>403 Forbidden</title>
      <p>Directory access is forbidden.</p>';
    }

    public function options() {
      $data['subview'] = 'admin_page/settings/options';
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_options() {
      //code
      $data['site_name'] = $this->input->post('site_name');
      $data['short_name'] = $this->input->post('short_name');
      $data['keywords'] = $this->input->post('keywords');
      $data['description'] = $this->input->post('description');
      $data['url'] = $this->input->post('url');
      $data['version'] = $this->input->post('version');
      $data['favicon'] = $this->input->post('favicon');
      $data['theme'] = $this->input->post('theme');
      $data['limit_per_page'] = $this->input->post('limit_per_page');
      $data['phone'] = $this->input->post('phone');
      $data['email'] = $this->input->post('email');
      $data['address'] = $this->input->post('address');

      $status = $this->Media->updateMediaOptions($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function menu() {
      $data['subview'] = 'admin_page/settings/menu';
      $data['data_subview'] = array(
        'cate_menu' => $this->Mcategory->getSortByParent(0,'CATEPOSITION','ASC',1)
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_menu() {
      //code
      $id = $this->input->post('id');
      $data['CATEPOSITION'] = intval($this->input->post('position'));

      $status = $this->Mcategory->updateCate($data,$id);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function themes() {
      $directory = 'application/views/mp_site/themes';
      $list = scandir($directory);
      $themes_info = array();
      // print_r($entries);
      foreach ($list as $key => $dir) {
        // code...
        if(!(($dir == '.') || ($dir == '..') || ($dir == 'theme_notes.txt'))) {
          $themes_info[] = array(
            'themes_dir' => $dir,
            'themes_screenshot' => $dir.'/screenshot.png'
          );
        }
      }

      $data['subview'] = 'admin_page/settings/themes_list';
      $data['data_subview'] = array(
        'themes_info' => $themes_info
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_theme() {
      //code
      $data['theme'] = $this->input->post('theme');
      // var_dump($data);

      $status = $this->Media->updateMediaOptions($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function slideshow_default() {
      $data['subview'] = 'admin_page/settings/slideshow_default';
      $this->load->view('admin_page/main_layout',$data);
    }

    public function slideshow_latestpost() {
      $data['subview'] = 'admin_page/settings/slideshow_latestpost';
      $data['data_subview'] = array(
        'latestpost' => $this->Mposts->getFiveLatestPosts()
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function slideshow_mostview() {
      $data['subview'] = 'admin_page/settings/slideshow_mostview';
      $data['data_subview'] = array(
        'mostview' => $this->Mposts->getFiveMostView()
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_slideshow() {
      //code
      for($i=1; $i <= (ceil((count($_POST))/4)); $i++) {
        $id = intval($this->input->post('id_slider_'.$i));
        $data[$id]['MEDIATITLE'] = $this->input->post('title_slider_'.$i);
        $data[$id]['MEDIADATA'] = $this->input->post('url_slider_'.$i);
        $data[$id]['MEDIAEMBEDDEDLINK'] = $this->input->post('img_slider_'.$i);
        $this->Media->updateMediaOptionById($data[$id],$id);
      }
      echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật trình chiếu thành công!"));
    }

    public function pictures() {
      $data['subview'] = 'admin_page/settings/pictures';
      $data['data_subview'] = array(
        'lastupdate' => $this->Media->getLatestUpdate('pictures')
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function add_picture() {
      //code
      $data['MEDIAID'] = $this->input->post('id');
      $data['CATEID'] = $this->input->post('category');
      $data['USERID'] = $this->input->post('user');
      $data['MEDIAEMBEDDEDLINK'] = $this->input->post('picture');
      $data['MEDIATYPE'] = 'pictures';

      $status = $this->Media->insertMediaOption($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm hình ảnh thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm hình ảnh thất bại!"));
			}
    }

    public function delete_picture() {
      //code
      $list_pictures = $this->input->post('field');
      foreach ($list_pictures as $key => $id) {
        $this->Media->deleteMediaOption($id);
      }

			echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa hình ảnh thành công!"));
    }

    public function videos() {
      $data['subview'] = 'admin_page/settings/videos';
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_videos() {
      //code
      for($i=1; $i <= (ceil((count($_POST))/2)); $i++) {
        $data[$_POST[$i]] = $this->input->post($_POST[$i]);
      }

      $status = $this->Media->updateMediaOptions($data);

			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }
}
