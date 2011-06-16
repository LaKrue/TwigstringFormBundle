<?php
/*
 * (c) LaKrue <symfony@lakrue.com>
 */

namespace LK\TwigstringFormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CodeType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('text', 'textarea', array('label'=>'Twig code'));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'csrf_protection'   => false,
			'intention'  => 'code',
		);
	}

	public function getName()
	{
		return 'code';
	}
}