<?php

namespace RNR\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Controller for Home
 * @author Rein Bauwens	<rein.bauwens@outlook.com>
 */
class HomeController implements ControllerProviderInterface {

	/**
	 * Returns routes to connect to the given application.
	 * @param Application $app An Application instance
	 * @return ControllerCollection A ControllerCollection instance
	 */
	public function connect(Application $app) {

		//@note $app['controllers_factory'] is a factory that returns a new instance of ControllerCollection when used.
		//@see http://silex.sensiolabs.org/doc/organizing_controllers.html
		$controllers = $app['controllers_factory'];

		// Bind sub-routes
		$controllers
			->get('/', array($this, 'welkom'))
			->method('GET|POST')
			->bind('Home.start');

		$controllers
			->get('/HelpMee', array($this, 'HelpMee'))
			->method('GET|POST')
			->bind('Home.HelpMee');

		$controllers
			->get('/HoeWerktHet', array($this, 'HoeWerktHet'))
			->method('GET|POST')
			->bind('Home.HoeWerktHet');

		$controllers
			->get('/Realisaties', array($this, 'Realisaties'))
			->method('GET|POST')
			->bind('Home.Realisaties');

		// Redirect to login by default
		$controllers->get('/', function(Application $app) {
			return $app->redirect($app['url_generator']->generate('Home.start'));
		});	

		// Return ControllerCollection
		return $controllers;
	}

	/**
	 * login page
	 * @param Application $app An Application instance
	 * @return string A blob of HTML
	 */
	public function welkom(Application $app) {
		return $app['twig']->render('Home/welkom.twig', array(
		));
	}

	public function HoeWerktHet(Application $app) {
		return $app['twig']->render('Home/HoeWerktHet.twig', array(
		));
	}

	public function Realisaties(Application $app) {
		return $app['twig']->render('Home/Realisaties.twig', array(
		));
	}

	public function HelpMee(Application $app) {
		return $app['twig']->render('Home/HelpMee.twig', array(
		));
	}
}


// EOF