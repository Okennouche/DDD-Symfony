<?php

declare(strict_types=1);

/**
 *
 * @ Created on 08/01/2019 10:21
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Security\User\Authenticator;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * Class LoginFormAuthenticator
 *
 * @package App\DDD\Security\User\Authenticator
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{

	use TargetPathTrait;

	private $queryRepository;
	private $router;
	private $csrfTokenManager;
	private $passwordEncoder;

	public function __construct(
		UserQueryRepositoryInterface $queryRepository,
		RouterInterface $router,
		CsrfTokenManagerInterface $csrfTokenManager,
		UserPasswordEncoderInterface $passwordEncoder
	) {
		$this->queryRepository = $queryRepository;
		$this->router = $router;
		$this->csrfTokenManager = $csrfTokenManager;
		$this->passwordEncoder = $passwordEncoder;
	}

	public function supports(Request $request)
	{
		return 'security_login' === $request->attributes->get('_route')
			&& $request->isMethod('POST');
	}

	public function getCredentials(Request $request)
	{
		$credentials = [
			'email' => $request->request->get('_email'),
			'password' => $request->request->get('_password'),
			'csrf_token' => $request->request->get('_csrf_token'),
		];
		$request->getSession()->set(
			Security::LAST_USERNAME,
			$credentials['email']
		);

		return $credentials;
	}

	public function getUser($credentials, UserProviderInterface $userProvider)
	{
		$token = new CsrfToken('authenticate', $credentials['csrf_token']);
		if (!$this->csrfTokenManager->isTokenValid($token)) {
			throw new InvalidCsrfTokenException();
		}

		$user = $this->queryRepository->loadUserByUsername($credentials['email']);

		if (!$user) {
			throw new CustomUserMessageAuthenticationException('login_error_email_username');
		}

		return $user;
	}

	public function checkCredentials($credentials, UserInterface $user)
	{
		return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
	}

	public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
	{
		if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
			return new RedirectResponse($targetPath);
		}

		return new RedirectResponse($this->router->generate('home', ['_locale' => $request->getLocale()]));
	}

	public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
	{
		$data = array(
			'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

			// or to translate this message
			// $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
		);

		return new JsonResponse($data, Response::HTTP_FORBIDDEN);
	}

	protected function getLoginUrl()
	{
		return $this->router->generate('security_login');
	}

	public function supportsRememberMe()
	{
		return true;
	}
}