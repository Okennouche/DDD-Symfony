<?php

declare(strict_types=1);

/**
 *
 * @ created on 30/12/18 00:28
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\User\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\DDD\Infrastructure\User\DataMapper\LoginMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\DDD\Application\UseCase\Query\User\Login\LoginQuery;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


/**
 * class LoginType
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class LoginType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array                $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add(
				'email',
				EmailType::class,
				[
					'label' => 'login.email',
					'required' => false,
					'attr' => [
						'class' => 'rounded-0'
					]
				]
			)
			->add(
				'password',
				PasswordType::class,
				[
					'label' => 'login.password',
					'attr' => [
						'class' => 'rounded-0'
					]
				]
			)
			->setDataMapper(new LoginMapper());
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
			[
				'data_class' => LoginQuery::class,
				'translation_domain' => 'login',
				'csrf_protection' => true,
				'csrf_field_name' => 'csrf_token',
				'empty_data' => null
			]
		);
	}
}