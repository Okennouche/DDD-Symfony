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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use App\DDD\Domain\Exception\User\EmailIsValidException;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use App\DDD\Security\User\Encoder\Interfaces\EncoderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use App\DDD\Infrastructure\Service\MessageBag\OnSuccessAuthentication;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use App\DDD\Domain\Repository\User\Interfaces\UserQueryRepositoryInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

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

	/**
	 * @var UserQueryRepositoryInterface $queryRepository
	 */
	private $queryRepository;

	/**
	 * @var RouterInterface $router
	 */
	private $router;

	/**
	 * @var CsrfTokenManagerInterface $csrfTokenManager
	 */
	private $csrfTokenManager;

	/**
	 * @var EncoderInterface $passwordEncoder
	 */
	private $passwordEncoder;

	/**
	 * @var TranslatorInterface
	 */
	private $translator;
	/**
	 * @var MessageBusInterface
	 */
	private $bus;

	/**
	 * LoginFormAuthenticator constructor.
	 *
	 * @param UserQueryRepositoryInterface $queryRepository
	 * @param RouterInterface              $router
	 * @param CsrfTokenManagerInterface    $csrfTokenManager
	 * @param EncoderInterface             $passwordEncoder
	 * @param TranslatorInterface          $translator
	 * @param MessageBusInterface          $bus
	 */
	public function __construct(
		UserQueryRepositoryInterface $queryRepository,
		RouterInterface $router,
		CsrfTokenManagerInterface $csrfTokenManager,
		EncoderInterface $passwordEncoder,
		TranslatorInterface $translator,
		MessageBusInterface $bus
	) {
		$this->queryRepository = $queryRepository;
		$this->router = $router;
		$this->csrfTokenManager = $csrfTokenManager;
		$this->passwordEncoder = $passwordEncoder;
		$this->translator = $translator;
		$this->bus = $bus;
	}

	/**
	 * @inheritdoc
	 */
	public function supports(Request $request)
	{
		return 'security_login' === $request->attributes->get('_route')
			&& $request->isMethod('POST');
	}

	/**
	 * @inheritdoc
	 */
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

	/**
	 * @inheritdoc
	 */
	public function getUser($credentials, UserProviderInterface $userProvider)
	{
		$token = new CsrfToken('authenticate', $credentials['csrf_token']);

		if (!$this->csrfTokenManager->isTokenValid($token)) {
			throw new InvalidCsrfTokenException();
		}

		$user = $this->queryRepository->loadUserByUsernameOrEmail($credentials['email']);

		if (!$user) {
			throw new EmailIsValidException(
				$this->translator->trans('login_error_email_username', [], 'security_login')
			);
		}

		return $user;
	}

	/**
	 * @inheritdoc
	 */
	public function checkCredentials($credentials, UserInterface $user)
	{
		return $this->passwordEncoder->isPasswordValid($user->getPassword(), $credentials['password'], null);
	}

	/**
	 * @inheritdoc
	 */
	public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
	{
		if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
			return new RedirectResponse($targetPath);
		}

		$this->bus->dispatch(new OnSuccessAuthentication($token->getUsername()));

		return new RedirectResponse(
			$this->router->generate(
				'home',
				[
					'_locale' => $request->getLocale()
				]
			)
		);
	}

	/**
	 * @inheritdoc
	 */
	public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
	{
		if ($request->hasSession()) {
			$request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
		}

		$url = $this->getLoginUrl();

		return new RedirectResponse($url);
	}

	/**
	 * @inheritdoc
	 */
	protected function getLoginUrl()
	{
		return $this->router->generate('security_login');
	}

	/**
	 * @inheritdoc
	 */
	public function supportsRememberMe()
	{
		return true;
	}
}