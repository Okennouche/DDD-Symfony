<?php

declare(strict_types=1);

/**
 *
 * @ created on 06/01/19 16:18
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Security\Authenticator;

use App\DDD\Domain\Entity\User\User;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use App\DDD\Infrastructure\User\Repository\UserQueryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use App\DDD\Domain\Security\Authenticator\Interfaces\LoginFormAuthenticatorInterface;


/**
 * class LoginFormAuthenticator
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements LoginFormAuthenticatorInterface
{

	use TargetPathTrait;

	private $queryRepository;
	private $router;
	private $csrfTokenManager;
	private $passwordEncoder;

	public function __construct(UserQueryRepositoryInterface $queryRepository, RouterInterface $router, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder)
	{
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
			'email' => $request->request->get('login')['email'],
			'password' => $request->request->get('login')['password'],
			'csrf_token' => $request->request->get('login')['csrf_token']
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

		$user = $this->queryRepository->findOneByEmail($credentials['email']);

		if (!$user && !$user instanceof User) {
			// fail authentication with a custom error
			//throw new CustomUserMessageAuthenticationException('Email could not be found.');
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

		// For example : return new RedirectResponse($this->router->generate('some_route'));
		throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
	}

	protected function getLoginUrl()
	{
		return $this->router->generate('home');
	}
}