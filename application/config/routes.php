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
|	https://codeigniter.com/userguide3/general/routing.html
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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$default_controller = "web";
$language_alias = array('en');
// exceptions
$controller_exceptions = array('web', 'login', 'admin', 'admin_blog', 'admin_service', 'admin_category', 'admin_brand', 'admin_product', 'admin_invoice', 'admin_vendor', 'admin_gallery', 'admin_settings', 'admin_enquiry', 'admin_testimonial', 'admin_faq');

// route
$route['default_controller'] = $default_controller;
$route["^(".implode('|', $language_alias).")/(".implode('|', $controller_exceptions).")(.*)"] = '$2';
$route["^(".implode('|', $language_alias).")?/(.*)"] = $default_controller.'/$2';
$route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $default_controller.'/$1';
foreach($language_alias as $language) {
    $route[$language] = $default_controller.'/index';
}
$route['404_override'] = 'web/error';
$route['^(it|en)/(.+)$'] = "$2";
$route['^(it|en)$'] = $route['default_controller'];
$route['translate_uri_dashes'] = TRUE;
$route['upload'] = 'Upload';

// Blog Controller Route Path
$route['admin/blog'] = 'admin_blog/index';
$route['admin/blog/(:any)'] = 'admin_blog/$1';
$route['admin/blog/(:any)/(:any)'] = 'admin_blog/$1/$2';

// service Controller Route Path
$route['admin/service'] = 'admin_service/index';
$route['admin/service/(:any)'] = 'admin_service/$1';
$route['admin/service/(:any)/(:any)'] = 'admin_service/$1/$2';

// category Controller Route Path
$route['admin/category'] = 'admin_category/index';
$route['admin/category/(:any)'] = 'admin_category/$1';
$route['admin/category/(:any)/(:any)'] = 'admin_category/$1/$2';

// product Controller Route Path
$route['admin/product'] = 'admin_product/index';
$route['admin/product/(:any)'] = 'admin_product/$1';
$route['admin/product/(:any)/(:any)'] = 'admin_product/$1/$2';

// invoice Controller Route Path
$route['admin/invoice'] = 'admin_invoice/index';
$route['admin/invoice/(:any)'] = 'admin_invoice/$1';
$route['admin/invoice/(:any)/(:any)'] = 'admin_invoice/$1/$2';

// vendor Controller Route Path
$route['admin/vendor'] = 'admin_vendor/index';
$route['admin/vendor/(:any)'] = 'admin_vendor/$1';
$route['admin/vendor/(:any)/(:any)'] = 'admin_vendor/$1/$2';

// gallery Controller Route Path
$route['admin/gallery'] = 'admin_gallery/index';
$route['admin/gallery/(:any)'] = 'admin_gallery/$1';
$route['admin/gallery/(:any)/(:any)'] = 'admin_gallery/$1/$2';

// settings Controller Route Path
$route['admin/settings'] = 'admin_settings/index';
$route['admin/settings/(:any)'] = 'admin_settings/$1';
$route['admin/settings/(:any)/(:any)'] = 'admin_settings/$1/$2';

// enquiry Controller Route Path
$route['admin/enquiry'] = 'admin_enquiry/index';
$route['admin/enquiry/(:any)'] = 'admin_enquiry/$1';
$route['admin/enquiry/(:any)/(:any)'] = 'admin_enquiry/$1/$2';

// brand Controller Route Path
$route['admin/brand'] = 'admin_brand/index';
$route['admin/brand/(:any)'] = 'admin_brand/$1';
$route['admin/brand/(:any)/(:any)'] = 'admin_brand/$1/$2';

// testimonial Controller Route Path
$route['admin/testimonial'] = 'admin_testimonial/index';
$route['admin/testimonial/(:any)'] = 'admin_testimonial/$1';
$route['admin/testimonial/(:any)/(:any)'] = 'admin_testimonial/$1/$2';
$route['admin/testimonial/(:any)/(:any)/(:any)'] = 'admin_testimonial/$1/$2/$3';

// faq Controller Route Path
$route['admin/faq'] = 'admin_faq/index';
$route['admin/faq/(:any)'] = 'admin_faq/$1';
$route['admin/faq/(:any)/(:any)'] = 'admin_faq/$1/$2';
$route['admin/faq/(:any)/(:any)/(:any)'] = 'admin_faq/$1/$2/$3';