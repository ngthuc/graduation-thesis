<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('has_role'))
{
    function has_role($user,$str_role)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      $CI->load->model('Musers');

      // Call a function of the model
      return $CI->Musers->HasRole($user,$str_role);
    }
}

if (!function_exists('check_domain'))
{
    function check_domain($email_string)
    {
      // Get a reference to the controller object
      //$CI = get_instance();
      // use this below
      $CI = &get_instance();

      // You may need to load the model if it hasn't been pre-loaded
      // $CI->load->model('Musers');

      // Call a function of the model
      // return $CI->Musers->HasRole($user,$str_role);

      $explode_string = explode('@',$email_string);
      foreach ($explode_string as $key => $string) {
        // code...
        if($string == 'lapvo3.tk') {
          return TRUE;
        }
      }
      return FALSE;
    }
}
