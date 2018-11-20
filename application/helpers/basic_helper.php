<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('create_pagination'))
{
    function create_pagination($base_url,$total_rows,$per_page,$params = null)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      if(isset($params)) {
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;

        foreach ($params as $key => $value) {
          $config[$key] = $value;
        }
      } else {
        // default initialize
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
      }

      $CI->pagination->initialize($config); // pagination library required

      // build paging links
      return $CI->pagination->create_links();
    }
}

if (!function_exists('get_info'))
{
    function get_info($user, $type, $key = null)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Minfo');

      // Call a function of the model
      if(isset($key)) {
        $value = $CI->Minfo->getInfoByUser($user,$type,$key);
        if(count($value) > 0) {
          if(($type == 'person') && ($key == 'avatar')) {
            return $value['INFOIMAGE'];
          } else if(($type == 'person') && ($key == 'birthday')) {
            return $value['INFODATE'];
          } else {
            return $value['INFOCONTENT'];
          }
        } else null;
      } else {
        return $CI->Minfo->getInfoByUser($user,$type);
      }
    }
}

if (!function_exists('get_person_info_id'))
{
    function get_person_info_id($user, $key)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Minfo');

      // Call a function of the model
      $result = $CI->Minfo->getInfoByUser($user,'person',$key);
      return $result['INFOID'];
    }
}

if (!function_exists('get_system'))
{
    function get_system($type, $key = null, $limit = null, $start = 0)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Msystem');

      // Call a function of the model
      if($type == 'default') {
        $value = $CI->Msystem->getSystemWithTitle($type,$key);
        return $value['SYSTEMDATA'];
      } else if($type == 'domain') {
        return $CI->Msystem->getSystemByType($type);
      } else {
        return $CI->Msystem->getList();
      }
    }
}

if (!function_exists('get_media_id'))
{
    function get_media_id($type, $id, $data)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Media');

      // Call a function of the model
      $value = $CI->Media->getMediaWithId($type,$id);
      if($data == 'title') {
        return $value['MEDIATITLE'];
      } else if($data == 'data') {
        return $value['MEDIADATA'];
      } else if($data == 'link') {
        return $value['MEDIALINK'];
      } else {
        return 'Error: Missing an argument!';
      }
    }
}

if (!function_exists('get_category_by_id'))
{
    function get_category_by_id($cate_id)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Mcategory');

      // Call a function of the model
      return $CI->Mcategory->getById($cate_id);
    }
}

if (!function_exists('get_user_by_id'))
{
    function get_user_by_id($user_id)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      return $CI->Musers->getById($user_id);
    }
}

if (!function_exists('get_active_class'))
{
    function get_active_class($uri,$pass_key)
    {
      // code...
      echo ($uri == $pass_key) ? 'active' : '';
    }
}

if (!function_exists('get_youtube_id'))
{
    function get_youtube_id($url)
    {
      // code...
      $first_explode_url = explode('=',$url);
      if(strlen($first_explode_url[1]) > 11) {
        $second_explode_url = explode('&',$first_explode_url[1]);
        $youtube_id = $second_explode_url[0];
      } else {
        $youtube_id = $first_explode_url[1];
      }
      return $youtube_id;
    }
}

if (!function_exists('get_resource'))
{
    function get_resource($url)
    {
      // code...
      $init_url_default = 'https://docs.google.com/uc?id=';
      $first_explode_url = explode('/',$url);
      foreach ($first_explode_url as $key => $explode_string) {
        // code...
        if(strlen($explode_string) == 33) {
          return $init_url_default.$explode_string;
        }
      }
      return null;
    }
}

if (!function_exists('get_pdf_link'))
{
    function get_pdf_link($str_st)
    {
      // code...
      if(strpos($str_st, 'href=')) {
        $first_explode_str = explode('href="',$str_st);
        if(isset($first_explode_str)) {
          foreach ($first_explode_str as $key => $str_nd) {
              // code...
              $second_explode_str = explode('" target',$str_nd);
            }
        }
        return $second_explode_str[0];
      } else return FALSE;
    }
}

if (!function_exists('convert_vi'))
{
    function convert_vi($str)
    {
        //Your code here
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        $str = str_replace(" ","-",$str);
        return $str;
    }
}

if (!function_exists('replace_url_media'))
{
    function replace_url_media($str)
    {
        //Your code here
        $str = str_replace("//spsim_media","/spsim_media",$str);
        return $str;
    }
}
