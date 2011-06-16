<?php
/*
 * (c) LaKrue <symfony@lakrue.com>
 */

namespace LaKrue\RenderStringFormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ExecuteType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('var_a', 'text', array('label'=>'Variable \'A\'', 'required'=>false));
		$builder->add('var_b', 'text', array('label'=>'Variable \'B\'', 'required'=>false));
		$builder->add('twig', 'textarea', array('label'=>'Enter Twig code'));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'csrf_protection'   => true,
			'intention'  => 'execute',
		);
	}

	public function getName()
	{
		return 'execute';
	}
}