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

$route['admin/logout'] = "home/logout";

$route['admin/detail'] = "admin/view_account";

$route['admin'] = "admin";

$route['admin/search'] = "search/student_search";

$route['admin/pendencia/error'] = "search/dataTableError";

$route['limbo/error'] = "limbo/error";

$route['limbo'] = "limbo";

$route['pos_e_pesquisa'] = "limbo";

$route['pos_e_pesquisa/limbo_search'] = "search/limbo_search";

$route['historico'] = "historico";
$route['historico/lista_lotes'] = "historico/lista_lotes";
$route['historico/historico_search'] = "historico/historico_search";

$route['configuracao'] = "configuracao";

$route['configuracao/emailRetorno'] = "configuracao/emailRetorno";

$route['configuracao/uploadRetorno'] = "configuracao/uploadRetorno";

$route['envioDeFotos/retornoFotos'] = "configuracao/retornoFotos";

$route['historico/confirmar_chegada_carteirinhas/(:num)'] = "historico/confirmar_chegada_carteirinhas/$1";

$route['configuracao/multiupload'] = "configuracao/multiupload";
 
$route['signout'] = "home/logout";

$route['signin'] = "home/my_login";

$route[':any'] = "home";

$route['default_controller'] = "home";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */