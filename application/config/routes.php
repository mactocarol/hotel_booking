<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

| 

*/



//include(APPPATH.'third_party/custom_routes.php');

//$CustomRoutes = new custom_routes();



$route['default_controller'] = "home";

$route['404_override'] = '';

$route['hotel/list_hotel/(:any)'] = "hotel/list_hotel";
$route['login'] = "user_login";
/*$route['country/(:any)'] = "welcome/category";

$route['companies/(:any)/(:any)'] = "welcome/listing";

$route['articles'] = "welcome/latest_articles";

$route['articles/(:any)/(:any)'] = "welcome/latest_articles";

$route['search'] = "welcome/advanced_search";

$route['detail/(:any)'] = "welcome/list_read_more";

$route['companies'] = "welcome/listing";

$route['companies/(:any)'] = "welcome/listing";

$route['companies/(:any)/(:any)/(:any)'] = "welcome/listing";

$route['contact'] = "welcome/contact_us";

$route['latest/(:any)'] = "welcome/latest_listing";

$route['cat_detail/(:any)'] = "welcome/cat_detail";

$route['latest'] = "welcome/latest_listing";

$route['artdetail/(:any)'] =  "welcome/article_read_more";

$route['fill-form/(:any)']  =	"submission/submit_listing";

$route['post_final']  =	"submission/submit_final";

$route['choose-plan'] = "submission";

$route['seo_user']  =	"submission/seo_registration";*/

/* End of file routes.php */

/* Location: ./application/config/routes.php */





