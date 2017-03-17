<?php
// Require Bootstrap
require __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Use Request from Symfony Namespace
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Handle errors that were generated
$app->error(function (\Exception $e, $code) use ($app) {
	//check if the user is logged in
	//set acces level and username to default
	$access_level = 0;
	$username = '';

	// check if user is already logged in
	if ($app['session']->get('user') && ($app['db.people']->fetchAdminPerson($app['session']->get('user')))) {

		//get the user from de database.
		$user = $app['db.people']->fetchAdminPerson($app['session']->get('user'));

		//set acces level and username
		$username = $user[0]['name'];
		$access_level = $user[0]['access_level'];
	}

	if ($code == 404) { //set page content for 404 page not found error
		//set the breadcrumbs for the page

		$title = '404 - File Not Found';
		$title_error = '404 - Page not found';
		$msgOne = 'We are sorry to announce that the page you are looking for is missing.';
		$msgTwo = 'Please us the top menu to redrect back to the home page.';
		$error = false;
	} 
	else { //set page content for general server error (like code errors, mysql password etc)
		//set the breadcrumbs for the page

		$title = 'Something went horribly wrong';
		$title_error = 'Error general en el servidor';
		$msgOne = 'Lo sentimos, parece que hemos tenido un pequeño error.';
		$msgTwo = 'Por favor, ve a tomar un café y regresa en unos minutos.';
		$error = false;
	}
	if($app['debug']){
		$error = true;
	}
	return $app['twig']->render('errors/error.twig', array(
		'error' => $e->getMessage(), 
		'userLogin' => false,
		'pageTitle' => $title,
		'errorTitle' => $title_error,
		'msgOne' => $msgOne,
		'msgTwo' => $msgTwo,
		'errorMsg' => $error,
		'access_level' => $access_level,
		'username' => $username,
	));
});

// Before Middleware: Define the first url part and make that available as a variable in Twig
// @note: Next to before() there's also after() — @see http://silex.sensiolabs.org/doc/middlewares.html
$app->before(function (Request $request) use ($app) {
	$app['twig']->addGlobal('first_url_part', explode('/', $request->getPathInfo())[1]);
});

// Redirect to home on root access
$app->get('/', function(Silex\Application $app) {
	return $app->redirect($app['url_generator']->generate('Home.start')); //from home we need to check if someone is logged in
});

//Attatch the user session to the 
$app['twig']->addGlobal('user',$app['session']->get('user'));

// Mount our controllers (dynamic routes)
$app->mount('/Home/', new RNR\Provider\Controller\HomeController());


