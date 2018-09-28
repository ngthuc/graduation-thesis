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
