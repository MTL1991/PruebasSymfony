<?php

namespace Acme\DemoBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegardsController extends Controller{
	
	/**
	*@Route("/index", name="index")
	*/
	public function indexAction($name='', Request $request){
		$session = $request->getSession();
		$session->set('name', 'pepe');
		return $this->render('AcmeDemoBundle:Demo:hello.html.twig', array('name' => $session->get('name') ) );
		
	}


	/**
	*@Route("/hola/{name}", name="hola")
	*/
	public function spanishAction($name ='',Request $request){
		
		if($name != 'pepe'){
			$request->getSession()->getFlashBag()->add(
			'notice',
			'Español tu? Que dices!'
			);
			return $this->redirect($this->generateUrl('index'));
		}
		return new Response('<html><body>Hola '.$name.'!</body></html>');
	}
	/**
	*@Route("/ciao/{name}/{surname}", name="ciao")
	*/
	public function italianAction($name = '', $surname = ''){
		return new Response('<html><body>Ciao '.$name.' ' .$surname.'!</body></html>');
	}
	/**
	*@Route("/salut/{name}/{surname}", name="salut")
	*/
	public function frenchAction($name, $surname = ''){
		return new Response('<html><body>Salut '.$name.' ' .$surname.'!</body></html>');
	}
}