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
			->get('/', array($this, 'index'))
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
			->get('/Installatie', array($this, 'Installatie'))
			->method('GET|POST')
			->bind('Home.Installatie');

		$controllers
			->get('/Realisaties', array($this, 'Realisaties'))
			->method('GET|POST')
			->bind('Home.Realisaties');

		$controllers
			->get('/ZonnestadInCijfers', array($this, 'ZonnestadInCijfers'))
			->method('GET|POST')
			->bind('Home.ZonnestadInCijfers');
		
		$controllers
			->get('/WatIsZonnestad', array($this, 'WatIsZonnestad'))
			->method('GET|POST')
			->bind('Home.WatIsZonnestad');

		$controllers
			->get('/EigenWoning', array($this, 'EigenWoning'))
			->method('GET|POST')
			->bind('Home.EigenWoning');

		$controllers
			->get('/Appartementen', array($this, 'Appartementen'))
			->method('GET|POST')
			->bind('Home.Appartementen');

		$controllers
			->get('/Huurwoning', array($this, 'Huurwoning'))
			->method('GET|POST')
			->bind('Home.Huurwoning');

		$controllers
			->get('/GroterDak', array($this, 'GroterDak'))
			->method('GET|POST')
			->bind('Home.GroterDak');
		$controllers
			->get('/Partners', array($this, 'Partners'))
			->method('GET|POST')
			->bind('Home.Partners');

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
	public function index(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		
		return $app['twig']->render('Home/index.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function HoeWerktHet(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		
		return $app['twig']->render('Home/HoeWerktHet.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function Realisaties(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/Realisaties.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function ZonnestadInCijfers(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/ZonnestadInCijfers.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function HelpMee(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/HelpMee.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function Installatie(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/Installatie.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function WatIsZonnestad(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/WatIsZonnestad.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function EigenWoning(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/EigenWoning.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function Appartementen(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/Appartementen.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function Huurwoning(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/Huurwoning.twig', array(
			'urlfix' => $urlfix
		));
	}

	public function GroterDak(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/GroterDak.twig', array(
			'urlfix' => $urlfix
		));
	}
	public function Partners(Application $app) {
		
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'public_html') !== false){
			$urlfix ='';
		}
		else{
			$urlfix ='public_html/';
		}
		return $app['twig']->render('Home/Partners.twig', array(
			'urlfix' => $urlfix
		));
	}
}


// EOF