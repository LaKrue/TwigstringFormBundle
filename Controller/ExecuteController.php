<?php
/*
 * (c) LaKrue <symfony@lakrue.com>
 */

namespace LaKrue\RenderStringFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LaKrue\RenderStringFormBundle\Form\ExecuteType;

class ExecuteController extends Controller
{
    public function indexAction()
    {
    	$vars = array();
    	$form = $this->get('form.factory')->create(new ExecuteType());
    	$request = $this->get('request');
	    if($request->getMethod()=='POST') {
	        $form->bindRequest($request);
	        if($form->isValid()) {
	        	$var_a = @$_POST['execute']['var_a'];
	        	$var_b = @$_POST['execute']['var_b'];
	        	$twig_code = @$_POST['execute']['twig'];
	        	$params = array('A'=>$var_a, 'B'=>$var_b);
	        	$vars['rendered'] = $this->get('renderstring')->render($twig_code, $params);
	        }
	    }
	    $vars['execute'] = $form->createView();
        return $this->render('LaKrueRenderStringFormBundle:pages:index.html.twig', $vars);
    }
}
