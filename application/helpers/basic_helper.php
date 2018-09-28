<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if ( ! function_exists('theme_url'))
// {
// 	function theme_url($uri = '', $protocol = NULL)
// 	{
//     $CI = get_instance();
// 		return $CI->config->theme_url($uri, $protocol);
// 	}
// }
//
// // ------------------------------------------------------------------------
//
// if ( ! function_exists('theme_view'))
// {
// 	function theme_view($uri = '', $protocol = NULL)
// 	{
//     $CI = get_instance();
// 		return $CI->config->theme_view($uri, $protocol);
// 	}
// }

// if (!function_exists('get_media'))
// {
//     function get_media($type, $key = null, $limit = null, $start = 0)
//     {
//       // Get a reference to the controller object
//       //$CI = get_instance();
//       // use this below
//       $CI = &get_instance();
//
//       // You may need to load the model if it hasn't been pre-loaded
//       $CI->load->model('Media');
//
//       // Call a function of the model
//       if(isset($key)) {
//         $value = $CI->Media->getMediaWithTitle($type,$key);
//         return $value['MEDIAEMBEDDEDLINK'];
//       } else if(isset($limit)) {
//         $value = $CI->Media->getMediaByType($type,$limit,$start);
//         return $value;
//       } else {
//         $value = $CI->Media->getMediaByType($type);
//         return $value['MEDIAEMBEDDEDLINK'];
//       }
//     }
// }
//
// if (!function_exists('get_media_id'))
// {
//     function get_media_id($type, $id, $data)
//     {
//       // Get a reference to the controller object
//       //$CI = get_instance();
//       // use this below
//       $CI = &get_instance();
//
//       // You may need to load the model if it hasn't been pre-loaded
//       $CI->load->model('Media');
//
//       // Call a function of the model
//       $value = $CI->Media->getMediaWithId($type,$id);
//       if($data == 'title') {
//         return $value['MEDIATITLE'];
//       } else if($data == 'data') {
//         return $value['MEDIADATA'];
//       } else if($data == 'link') {
//         return $value['MEDIAEMBEDDEDLINK'];
//       } else {
//         return 'Error: Missing an argument!';
//       }
//     }
// }

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
