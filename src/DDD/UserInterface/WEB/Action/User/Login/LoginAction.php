<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 23:20
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Login;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DDD\Infrastructure\User\Form\LoginType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use App\DDD\UserInterface\WEB\Action\User\Login\Interfaces\LoginActionInterface;


/**
 * class LoginAction
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 * @Route("/login", name="security_login")
 *
 */
final class LoginAction implements LoginActionInterface
{

	/**
	 * @var Environment $twig
	 */
	private $twig;

	/**
	 * @var FormFactoryInterface
	 */
	private $formFactory;

	/**
	 * @var MessageBusInterface
	 */
	private $bus;

	/**
	 * @var UrlGeneratorInterface
	 */
	private $urlGenerator;

	/**
	 * @var AuthenticationUtils
	 */
	private $authenticationUtils;

	/**
	 * RegistrationAction constructor.
	 *
	 * @param Environment           $twig
	 * @param FormFactoryInterface  $formFactory
	 * @param MessageBusInterface   $bus
	 * @param UrlGeneratorInterface $urlGenerator
	 * @param AuthenticationUtils   $authenticationUtils
	 */
	public function __construct(
		Environment $twig,
		FormFactoryInterface $formFactory,
		MessageBusInterface $bus,
		UrlGeneratorInterface $urlGenerator,
		AuthenticationUtils $authenticationUtils
	) {
		$this->twig = $twig;
		$this->formFactory = $formFactory;
		$this->bus = $bus;
		$this->urlGenerator = $urlGenerator;
		$this->authenticationUtils = $authenticationUtils;
	}

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function __invoke(AuthenticationUtils $authenticationUtils)
	{
		// get the login error if there is one
		$error = $authenticationUtils->getLastAuthenticationError();
		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

		//$form = $this->formFactory->create(LoginType::class, null);

		return new Response(
			$this->twig->render(
				"User/Login/login.html.twig",
				[
					//'form'  => $form->createView(),
					'last_username' => $lastUsername,
					'error' => $error
				]
			)
		);
	}
}