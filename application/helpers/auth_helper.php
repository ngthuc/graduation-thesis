<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('has_role'))
{
    function has_role($user_role,$role_require)
    {
      return ($user_role == $role_require) ? TRUE : FALSE;
    }
}

if (!function_exists('get_role_logged'))
{
    function get_role_logged()
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // Call a function of the model
      $user_data = $CI->session->userdata('user');
      return $user_data['USERROLE'];
    }
}

if (!function_exists('get_id_logged'))
{
    function get_id_logged()
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // Call a function of the model
      $user_data = $CI->session->userdata('user');
      return $user_data['USERID'];
    }
}

if (!function_exists('get_status_site_of_user_logged'))
{
    function get_status_site_of_user_logged($username)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $get_status = $CI->Musers->getById($username);
      return $get_status['USERSTATUSSITE'];
    }
}

if (!function_exists('get_avatar_of_user_logged'))
{
    function get_avatar_of_user_logged($username)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $get_status = $CI->Musers->getById($username);
      return $get_status['USERAVATAR'];
    }
}

if (!function_exists('get_theme_of_user'))
{
    function get_theme_of_user($username)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $get_status = $CI->Musers->getById($username);
      return $get_status['USERTHEME'];
    }
}

if (!function_exists('check_domain'))
{
    function check_domain($email_string)
    {
      $explode_string = explode('@',$email_string);
      $email_domain = $explode_string[1];

      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Msystem');

      // Call a function of the model
      $domain_list = $CI->Msystem->getSystemByType('domain');
      foreach ($domain_list as $key => $value) {
        // code...
        $domain[] = $value['SYSTEMLINK'];
      }

      return in_array($email_domain,$domain);
    }
}

if (!function_exists('get_username'))
{
    function get_username($email_string)
    {
      $explode_string = explode('@',$email_string);
      return $explode_string[0];
    }
}

if (!function_exists('get_domain_email'))
{
    function get_domain_email($email_string)
    {
      $explode_string = explode('@',$email_string);
      return $explode_string[1];
    }
}

if (!function_exists('check_status_of_email'))
{
    function check_status_of_email($email_string)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $get_status = $CI->Musers->getStatusByEmail($email_string);
      return $get_status['USERSTATUS'];
    }
}

if (!function_exists('check_status_of_username'))
{
    function check_status_of_username($user_string)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $get_status = $CI->Musers->getStatusByUsername($user_string);
      return $get_status['USERSTATUS'];
    }
}

if (!function_exists('check_pass_username'))
{
    function check_pass_username($username_string,$password_string)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $user_by_pass = $CI->Musers->checkUserWithPass($username_string,$password_string);
      return ($user_by_pass > 0) ? TRUE : FALSE;
    }
}

if (!function_exists('check_email'))
{
    function check_email($email_string)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      $num_rows = $CI->Musers->getNumRowsByEmail($email_string);
      return ($num_rows > 0) ? TRUE : FALSE;
    }
}
