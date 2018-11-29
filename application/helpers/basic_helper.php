<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if (!function_exists('create_pagination'))
// {
//     function create_pagination($base_url,$total_rows,$per_page,$params = null)
//     {
//       // Get a reference to the controller object
//       //$CI = get_instance();
//       // use this below
//       $CI = &get_instance();
//
//       if(isset($params)) {
//         $config['base_url'] = $base_url;
//         $config['total_rows'] = $total_rows;
//         $config['per_page'] = $per_page;
//         $config['use_page_numbers'] = TRUE;
//
//         foreach ($params as $key => $value) {
//           $config[$key] = $value;
//         }
//       } else {
//         // default initialize
//         $config['base_url'] = $base_url;
//         $config['total_rows'] = $total_rows;
//         $config['per_page'] = $per_page;
//         $config["uri_segment"] = 3;
//         $config['use_page_numbers'] = TRUE;
//       }
//
//       $CI->pagination->initialize($config); // pagination library required
//
//       // build paging links
//       return $CI->pagination->create_links();
//     }
// }

if (!function_exists('call_info_level_2'))
{
    function call_info_level_2($user,$idparent)
    {
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Mcategory');

      $list_cate = $CI->Mcategory->getSortByParentForType($user,$idparent,'info');

      if(count($list_cate) > 0) {
        foreach ($list_cate as $key => $cate) {
          // code...
          echo '<div class="tb">
            <span class="year"></span>
            <ul class="list">
              <li>
               <span class="title">'.$cate['CATENAME'].'</span>';
               call_info($user,$cate['CATEID']);
              echo '</li>
            </ul>
          </div>';
        }
      }
    }
}

if (!function_exists('call_info'))
{
    function call_info($user,$idcate)
    {
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Minfo');

      $list_info = $CI->Minfo->getByCategory($user,$idcate,null,null,'INFODATE','DESC');

      if(count($list_info) > 0) {
        $flag = 0;
        foreach ($list_info as $key => $info) {
          // code...
          $type = $info['INFOTYPE'];
          if(($type == 'education') || ($type == 'distinction')) {
            echo '<div class="tb"><span class="year">'.get_date_follow_format($info['INFODATE']).'</span>
              <ul class="list">
                <li><span class="title">'.$info['INFOTITLE'].'</span>
                    <div class="info"><br />'.$info['INFOCONTENT'].'</div>
                </li>
              </ul>
            </div>';
          } else if(($type == 'research') || ($type == 'experience')) {
            echo '<div class="tb"><span class="year">'.$info['INFODATE'].'</span>
              <ul class="list">
                <li><span class="title">'.$info['INFOTITLE'].'</span>
                    <div class="info">'.$info['INFOCONTENT'].'</div>
                </li>
              </ul>
            </div>';
          } else if($type=='isi' || $type=='journal' || $type=='edited' || $type=='conference' || $type=='report' || $type=='thesis' || $type=='workshop' || $type=='reviewer' || $type=='seminars' || $type=='doctor') {
            if($flag <= 0) {
              $flag = $CI->Minfo->countInfoByType($user,$type);
              echo '<div class="tb"><span class="year"></span>
                <ul class="list">
                  <li><span class="title">'.get_publication_name($type).'</span>
                    <div class="info">';
            }
                /*
                  lần duyệt flag = 0 => in tiêu đề;
                  lần duyệt flag > 0 => không làm gì cả;
                */
            // phần nội dung
            echo '<br>'.$info['INFOTITLE'];
              echo ($info['INFOCONTENT']) ? '. '.$info['INFOCONTENT'] : '';
              echo ($info['INFODATE']) ? ', '.$info['INFODATE'] : '';
              echo '<br>';
            // hết phần nội dung
            /*
              lần duyệt, flag = 1 => in kết thúc;
            */
            if($flag == 1) {
              echo '</div>
                  </li>
                </ul>
              </div>';
            }
            $flag--;
          }
        }
      }
    }
}

if (!function_exists('get_date_follow_format'))
{
    function get_date_follow_format($base_date, $format='std')
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $date = date_create($base_date);
      $year_from_date = date_format($date,"Y");
      $month_from_date = date_format($date,"m");
      $day_from_date = date_format($date,"d");

      if(($month_from_date == '1') || ($month_from_date == '01')) {
        $month = 'Jan';
      } else if(($month_from_date == '2') || ($month_from_date == '02')) {
        $month = 'Feb';
      } else if(($month_from_date == '3') || ($month_from_date == '03')) {
        $month = 'Mar';
      } else if(($month_from_date == '4') || ($month_from_date == '04')) {
        $month = 'Apr';
      } else if(($month_from_date == '5') || ($month_from_date == '05')) {
        $month = 'May';
      } else if(($month_from_date == '6') || ($month_from_date == '06')) {
        $month = 'Jun';
      } else if(($month_from_date == '7') || ($month_from_date == '07')) {
        $month = 'Jul';
      } else if(($month_from_date == '8') || ($month_from_date == '08')) {
        $month = 'Aug';
      } else if(($month_from_date == '9') || ($month_from_date == '09')) {
        $month = 'Sep';
      } else if(($month_from_date == '10') || ($month_from_date == '10')) {
        $month = 'Oct';
      } else if(($month_from_date == '11') || ($month_from_date == '11')) {
        $month = 'Nov';
      } else if(($month_from_date == '12') || ($month_from_date == '12')) {
        $month = 'Dec';
      }

      if(strlen($base_date) == 4) {
        return $base_date;
      } else if(strlen($base_date) > 4) {
        if($format=='std') {
          return $month.' '.$year_from_date;
        } else if($format=='year') {
          return $year_from_date;
        } else if($format=='month') {
          return $month_from_date;
        } else if($format=='day') {
          return $day_from_date;
        }
      } else if(strlen($base_date) < 4) {
        return null;
      }
    }
}

if (!function_exists('get_date_data'))
{
    function get_date_data($date,$position=0)
    {
      $data = explode(' - ',$date);
      return $data[$position];
    }
}

if (!function_exists('get_name'))
{
    function get_name($uid)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $user = $CI->Musers->getById($uid);
      return $user['USERFULLNAME'];
    }
}

if (!function_exists('get_publication_name'))
{
    function get_publication_name($type)
    {
      if($type=='isi') return 'ISI/Scopus';
      if($type=='journal') return 'Journal, book chapter';
      if($type=='edited') return 'Edited book';
      if($type=='conference') return 'Conference, workshop';
      if($type=='report') return 'Technical report';
      if($type=='thesis') return 'Thesis';
      if($type=='workshop') return 'Workshop Organization';
      if($type=='reviewer') return 'Program committee member, reviewer';
      if($type=='seminars') return 'Invited seminars';
      if($type=='doctor') return 'Ph.D. Defense Committee';
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
      } else if($type == 'theme') {
        $value = $CI->Msystem->getSystemWithTitle($type,$key);
        return $value['SYSTEMDATA'];
      } else {
        return $CI->Msystem->getList();
      }
    }
}

if (!function_exists('check_unit_by_user'))
{
    function check_unit_by_user($user)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $user_data = $CI->Musers->getById($user);
      return (!isset($user_data['SCHID']) || !isset($user_data['FACID']) || !isset($user_data['DEPTID'])) ? TRUE : FALSE;
    }
}

if (!function_exists('get_unit'))
{
    function get_unit($type='department', $limit = null, $start = 0)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Mdepartment');
      $CI->load->model('Mfaculty');
      $CI->load->model('Mschool');

      // Call a function of the model
      if($type == 'department') {
        return $CI->Mdepartment->getList();
      } else if($type == 'faculty') {
        return $CI->Mfaculty->getList();
      } else if($type == 'school') {
        return $CI->Mschool->getList();
      } else {
        return null;
      }
    }
}

if (!function_exists('get_school_name'))
{
    function get_school_name($id)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Mschool');

      // Call a function of the model
      $name = $CI->Mschool->getById($id);
      return $name['SCHNAME'];
    }
}

if (!function_exists('get_faculty_name'))
{
    function get_faculty_name($id)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Mfaculty');

      // Call a function of the model
      $name = $CI->Mfaculty->getById($id);
      return $name['FACNAME'];
    }
}

if (!function_exists('get_department_name'))
{
    function get_department_name($id)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Mdepartment');

      // Call a function of the model
      $name = $CI->Mdepartment->getById($id);
      return $name['DEPTNAME'];
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

if (!function_exists('get_org_by_id'))
{
    function get_org_by_id($user_id,$type='dept')
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $user = $CI->Musers->getById($user_id);
      if($type=='dept') return $user['DEPTID'];
      if($type=='faculty') return $user['FACID'];
      if($type=='school') return $user['SCHTID'];
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

if (!function_exists('convert_url'))
{
    function convert_url($str)
    {
        //Your code here
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "a", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "e", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "i", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "o", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "u", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "y", $str);
        $str = preg_replace("/(Đ)/", "d", $str);
        $str = str_replace(" ","_",$str);
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

if (!function_exists('replace_url_paragraph'))
{
    function replace_url_paragraph($str)
    {
        //Your code here
        $str = ltrim($str, '<p>');
        $str = rtrim($str, '</p>');
        return $str;
    }
}

if (!function_exists('catehref_format'))
{
    function catehref_format($str)
    {
        //Your code here
        return str_replace("#","",$str);
    }
}

if (!function_exists('check_statistic'))
{
    function check_statistic($session)
    {
        //Your code here
        if(!isset($_SESSION['search'])) {
          return FALSE;
        } else return ($_SESSION['search'][$session] == null) ? FALSE : TRUE;
    }
}
