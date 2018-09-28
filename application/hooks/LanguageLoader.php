<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('lang');
        if ($site_lang) {
            $ci->lang->load('basic',$site_lang);
        } else {
            $ci->lang->load('basic','vietnamese');
        }
    }
}
