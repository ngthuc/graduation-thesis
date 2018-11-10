<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route for Auth
$route['canbo/login'] = 'home/login';
$route['canbo/logout'] = 'home/logout';
$route['canbo/auth'] = 'home/auth';
$route['canbo/reg'] = 'home/reg';
$route['canbo/check_ssid'] = 'home/checkFileSSID';
$route['canbo/send_ssid'] = 'home/sendFileSSID';
$route['canbo/destroy_ssid'] = 'home/destroyFileSSID';

// Route for Admin
$route['canbo'] = 'home';
$route['canbo/admin'] = 'admin/index';

// Route for Admin: Accounts
$route['canbo/admin/accounts'] = 'accounts/index';
$route['canbo/admin/accounts/profile'] = 'accounts/profile';
$route['canbo/admin/accounts/add_new'] = 'accounts/add_new';
$route['canbo/admin/accounts/add_new_processing'] = 'accounts/add_new_processing';
$route['canbo/admin/accounts/edit_account_processing'] = 'accounts/edit_account_processing';
$route['canbo/admin/accounts/delete_account'] = 'accounts/delete_account';
$route['canbo/admin/accounts/edit_account/(:any)'] = 'accounts/edit_account/$1';
$route['canbo/admin/accounts/profile/change_password'] = 'accounts/change_password';

// Route for Admin: Article
$route['canbo/admin/article'] = 'article/index';
$route['canbo/admin/article/add_new_article'] = 'article/add_new_article';
$route['canbo/admin/article/add_new_page'] = 'article/add_new_page';
$route['canbo/admin/article/(:num)'] = 'article/edit_article/$1';
$route['canbo/admin/article/add_new_processing'] = 'article/add_new_processing';
$route['canbo/admin/article/edit_article_processing'] = 'article/edit_article_processing';
$route['canbo/admin/article/delete_post'] = 'article/delete_article';

// Route for Admin: Category
$route['canbo/admin/category'] = 'category/index';
$route['canbo/admin/category/add_new'] = 'category/add_new';
$route['canbo/admin/category/edit_category/(:num)'] = 'category/edit_category/$1';
$route['canbo/admin/category/add_new_processing'] = 'category/add_new_processing';
$route['canbo/admin/category/edit_category_processing'] = 'category/edit_category_processing';
$route['canbo/admin/category/delete_category'] = 'category/delete_category';

// Route for Admin: Infomation
$route['canbo/admin/infomation'] = 'infomation/index';
$route['canbo/admin/infomation/add_person'] = 'infomation/add_person';
$route['canbo/admin/infomation/add_other'] = 'infomation/add_other';
$route['canbo/admin/infomation/edit_info/(:any)'] = 'infomation/edit_info/$1';
$route['canbo/admin/infomation/add_person_processing'] = 'infomation/add_person_processing';
$route['canbo/admin/infomation/add_new_processing'] = 'infomation/add_new_processing';
$route['canbo/admin/infomation/edit_info_processing'] = 'infomation/edit_info_processing';
$route['canbo/admin/infomation/delete_info'] = 'infomation/delete_info';

// Route for Language
$route['canbo/language/(:any)'] = 'home/language/$1';

// Route for Multimedia
$route['canbo/admin/multimedia'] = 'multimedia/index';
$route['canbo/admin/multimedia/pictures'] = 'multimedia/pictures';
$route['canbo/admin/multimedia/add_picture'] = 'multimedia/add_picture';
$route['canbo/admin/multimedia/delete_picture'] = 'multimedia/delete_picture';

// Route for Settings
$route['canbo/admin/settings'] = 'settings/index';
$route['canbo/admin/settings/update_options'] = 'settings/update_options';

// Route for Themes
$route['canbo/admin/themes'] = 'themes/index';
$route['canbo/admin/themes/menu'] = 'themes/menu';
$route['canbo/admin/themes/add_menu'] = 'themes/add_menu';
$route['canbo/admin/themes/update_themes'] = 'themes/update_themes';
$route['canbo/admin/themes/update_menu'] = 'themes/update_menu';
$route['canbo/admin/themes/delete_menu'] = 'themes/delete_menu';

// Route for public site
$route['~(:any)'] = 'profile/user/$1';
$route['~(:any)/admin'] = 'admin/checkRole/$1';

$route['article'] = 'mp_site/article';
$route['article/(:num)'] = 'mp_site/article/home/$1';
$route['article/post/(:any).html'] = 'mp_site/article/post/$1';
$route['article/author/(:any)'] = 'mp_site/article/author/$1';
$route['article/author/(:any)/(:num)'] = 'mp_site/article/author/$1/$2';
$route['article/category/(:any)'] = 'mp_site/article/category/$1';
$route['article/category/(:any)/(:num)'] = 'mp_site/article/category/$1/$2';
$route['article/gallery/'] = 'mp_site/article/gallery';
$route['article/gallery/(:num)'] = 'mp_site/article/gallery/$1';
$route['article/count_view/(:num)'] = 'mp_site/article/count_view/$1';

// Route test
$route['canbo/test'] = 'home/test';
$route['canbo/test/(:any)'] = 'home/test/$1';
