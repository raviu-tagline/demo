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
$route['default_controller'] = 'Login_Controller';
// $route['login'] = 'Login_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'Index_Controller';
$route['blank_page'] = 'Blank_Controller';
$route['register'] = 'Register_Controller';
$route['email_verify/:any'] = 'Register_Controller/redirection/$1';

$route['submit'] = 'Register_Controller/submit';
$route['login'] = 'Login_Controller/login';
$route['logout'] = 'Login_Controller/logout';

$route['change_password'] = 'Verify_Controller/submit';

$route['super_admin/dashboard'] = 'super_admin/Super_Controller';
$route['super_admin/project_status'] = 'super_admin/Super_Controller/status';
$route['super_admin/add_admin'] = 'super_admin/Super_Controller/add_admin';
// $route['super_admin/add_admin_data'] = "Register_Controller/submit";

$route['super_admin'] = 'super_admin/Super_Controller';
$route['super_admin/project'] = 'common/Common_Controller/project';
$route['super_admin/salary'] = 'common/Common_Controller/salary';
$route['super_admin/employee_profile'] = 'common/Common_Controller/employee';
$route['super_admin/queries'] = 'common/Common_Controller/queries';

// $route['super_admin/add_employee'] = 'common/Common_Controller/add_employee';
// $route['super_admin/add_employee_data'] = 'Register_Controller/submit';

$route['admin/dashboard'] = 'admin/Admin_Controller';

$route['admin/project'] = 'common/Common_Controller/project';
$route['admin/salary'] = 'common/Common_Controller/salary';
$route['admin/employee_profile'] = 'common/Common_Controller/employee';
$route['admin/queries'] = 'common/Common_Controller/queries';

// $route['admin/add_employee'] = 'common/Common_Controller/add_employee';
$route[':any/add_employee_data'] = 'Register_Controller/submit';

$route['employee/dashboard'] = 'employee/Employee_Controller';
// $route['employee/profile'] = 'employee/Employee_Controller/profile';
$route['employee/tasks'] = 'employee/Employee_Controller/tasks';

$route[':any/add_user'] = 'common/Common_Controller/add_user';

$route[':any/profile'] = 'common/Common_Controller/profile';

$route[':any/update_profile'] = 'common/Common_Controller/update_profile';

$route['super_admin/user_records'] = 'super_admin/Super_Controller/user_records';

$route['error'] = 'common/Common_Controller/error';

// $route['test'] = 'Register_Controller/test';

// $route['Common_Controller/index'] = 'Common_Controller';