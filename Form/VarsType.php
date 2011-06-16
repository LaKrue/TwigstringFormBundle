<?php
/*
 * (c) LaKrue <symfony@lakrue.com>
 */

namespace LK\TwigstringFormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class VarsType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('a', 'text', array('label'=>'a=', 'required'=>false));
		$builder->add('b', 'text', array('label'=>'b=', 'required'=>false));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'csrf_protection'   => false,
			'intention'  => 'vars',
		);
	}

	public function getName()
	{
		return 'vars';
	}
}