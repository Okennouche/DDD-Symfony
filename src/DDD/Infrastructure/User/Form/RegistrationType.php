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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use App\DDD\Infrastructure\User\DataMapper\RegistrationMapper;
use App\DDD\Application\UseCase\Command\User\Registration\RegistrationCommand;


/**
 * class RegistrationType
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class RegistrationType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array                $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add(
				'username',
				TextType::class,
				[
					'label' => 'registration.username',
					'required' => false,
					'attr' => [
						'class' => 'rounded-0'
					]
				]
			)
			->add(
				'email',
				EmailType::class,
				[
					'label' => 'registration.email',
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
					'label' => 'registration.password',
					'attr' => [
						'class' => 'rounded-0'
					]
				]
			)
			->add(
				'confirm_password',
				PasswordType::class,
				[
					'mapped' => false,
					'label' => 'registration.password.confirm',
					'attr' => [
						'class' => 'rounded-0'
					]
				]
			)
			->setDataMapper(new RegistrationMapper());
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
			[
				'data_class' => RegistrationCommand::class,
				'translation_domain' => 'registration',
				'csrf_protection' => true,
				'empty_data' => null
			]
		);
	}
}