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

// Controller Admin //

$route['admin/profile'] = 'Admin/profile_admin';
$route['admin/profile/update'] = 'Admin/profile_update';
$route['admin/profile/update/(:any)'] = 'Admin/profile_update/$1';
$route['admin/profile/update_password'] = 'Admin/profile_update_password';
$route['admin/profile/update_password/(:any)'] = 'Admin/profile_update_password/$1';

// Menu Admin Account
$route['admin/account/admin'] = 'Admin/account_admin';
$route['admin/account/admin/add'] = 'Admin/account_admin_add';
$route['admin/account/admin/view'] = 'Admin/account_admin_view';
$route['admin/account/admin/view/(:any)'] = 'Admin/account_admin_view/$1';
$route['admin/account/admin/status'] = 'Admin/account_admin_status';
$route['admin/account/admin/status/(:any)'] = 'Admin/account_admin_status/$1';
$route['admin/account/admin/update'] = 'Admin/account_admin_update';
$route['admin/account/admin/update/(:any)'] = 'Admin/account_admin_update/$1';
$route['admin/account/admin/delete'] = 'Admin/account_admin_delete';
$route['admin/account/admin/delete/(:any)'] = 'Admin/account_admin_delete/$1';

// Menu Store Account
$route['admin/account/store'] = 'Admin/account_store';
$route['admin/account/store/view'] = 'Admin/account_store_view';
$route['admin/account/store/view/(:any)'] = 'Admin/account_store_view/$1';
$route['admin/account/store/status'] = 'Admin/account_store_status';
$route['admin/account/store/status/(:any)'] = 'Admin/account_store_status/$1';
$route['admin/account/store/delete'] = 'Admin/account_store_delete';
$route['admin/account/store/delete/(:any)'] = 'Admin/account_store_delete/$1';

// Menu Users Account
$route['admin/account/users'] = 'Admin/account_users';
$route['admin/account/user/view'] = 'Admin/account_user_view';
$route['admin/account/user/view/(:any)'] = 'Admin/account_user_view/$1';
$route['admin/account/user/status'] = 'Admin/account_user_status';
$route['admin/account/user/status/(:any)'] = 'Admin/account_user_status/$1';
$route['admin/account/user/delete'] = 'Admin/account_user_delete';
$route['admin/account/user/delete/(:any)'] = 'Admin/account_user_delete/$1';

// Controller Home //
$route['registration'] = 'Home/registration';
$route['login'] = 'Home/login';

// Controller Store //
$route['registration/store'] = 'Store/store_registration';
$route['store/products'] = 'Store/products';
$route['store/products/add'] = 'Store/product_add';
$route['store/products/view'] = 'Store/product_view';
$route['store/products/view/(:any)'] = 'Store/product_view/$1';
$route['store/products/status'] = 'Store/product_status';
$route['store/products/status/(:any)'] = 'Store/product_status/$1';
$route['store/products/update'] = 'Store/product_update';
$route['store/products/update/(:any)'] = 'Store/product_update/$1';
$route['store/products/delete'] = 'Store/product_delete';
$route['store/products/delete/(:any)'] = 'Store/product_delete/$1';
$route['store/transactions/accept_order'] = 'Store/accept_order';
$route['store/transactions/accept_order/(:any)'] = 'Store/accept_order/$1';
$route['store/transactions/send_order'] = 'Store/send_order';
$route['store/transactions/send_order/(:any)'] = 'Store/send_order/$1';

$route['store/profile/update'] = 'Store/profile_update';
$route['store/profile/update/(:any)'] = 'Store/profile_update/$1';
$route['store/profile/update_password'] = 'Store/profile_update_password';
$route['store/profile/update_password/(:any)'] = 'Store/profile_update_password/$1';

// Controller Users //
$route['registration/user'] = 'Users/user_registration';
$route['home/add_cart'] = 'Users/addCart';
$route['home/add_cart/(:any)'] = 'Users/addCart/$1';
$route['users/carts/order'] = 'Users/order';
$route['users/carts/order/(:any)'] = 'Users/order/$1';
$route['users/carts/delete'] = 'Users/deleteCart';
$route['users/carts/delete/(:any)'] = 'Users/deleteCart/$1';
$route['users/transactions/order_arrived'] = 'Users/order_arrived';
$route['users/transactions/order_arrived/(:any)'] = 'Users/order_arrived/$1';

$route['users/profile/update'] = 'Users/profile_update';
$route['users/profile/update/(:any)'] = 'Users/profile_update/$1';
$route['users/profile/update_password'] = 'Users/profile_update_password';
$route['users/profile/update_password/(:any)'] = 'Users/profile_update_password/$1';