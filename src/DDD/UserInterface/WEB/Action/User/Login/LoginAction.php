<?php

declare(strict_types=1);

/**
 *
 * @ Created on 05/01/19 23:20
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Login;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\DDD\UserInterface\WEB\Action\User\Login\Interfaces\LoginActionInterface;

/**
 * Class LoginAction
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 * @Route({"en": "/login", "fr": "/connexion"}, name="security_login")
 */
final class LoginAction implements LoginActionInterface
{
	/**
	 * @var Environment $twig
	 */
	private $twig;

	/**
	 * @var AuthenticationUtils
	 */
	private $authenticationUtils;

	/**
	 * LoginAction constructor.
	 *
	 * @param Environment         $twig
	 * @param AuthenticationUtils $authenticationUtils
	 */
	public function __construct(
		Environment $twig,
		AuthenticationUtils $authenticationUtils
	) {
		$this->twig = $twig;
		$this->authenticationUtils = $authenticationUtils;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(AuthenticationUtils $authenticationUtils)
	{
		$error        = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		return new Response(
			$this->twig->render(
				"User/Login/login.html.twig",
				[
					'last_username' => $lastUsername,
					'error' => $error
				]
			)
		);
	}
}