<?php
/*
 * (c) LaKrue <symfony@lakrue.com>
 */

namespace LK\TwigstringFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LK\TwigstringFormBundle\Form\VarsType;
use LK\TwigstringFormBundle\Form\CodeType;

class ExecuteController extends Controller
{
    public function indexAction()
    {
    	// rendered default text
    	$vars = $this->get('form.factory')->create(new VarsType());
    	$code = $this->get('form.factory')->create(new CodeType());
    	$request = $this->get('request');
	    if($request->getMethod()=='POST') {
	        $vars->bindRequest($request);
	        $code->bindRequest($request);
	        if($vars->isValid() && $code->isValid()) {
	        	$var_a = @$_POST['vars']['a'];
	        	$var_b = @$_POST['vars']['b'];
	        	$text = @$_POST['code']['text'];
	        	$params = array('a'=>$var_a, 'b'=>$var_b);
	        	$rendered = $this->get('twigstring')->render($text, $params);
	        }
	    }
	    $params = array();
	    $params['vars'] = $vars->createView();
	    $params['code'] = $code->createView();
	    $params['rendered'] = @$rendered;
        return $this->render('LKTwigstringFormBundle:pages:index.html.twig', $params);
    }
}
