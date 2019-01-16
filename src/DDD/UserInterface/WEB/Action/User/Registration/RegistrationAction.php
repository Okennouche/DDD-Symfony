<?php

declare(strict_types=1);

/**
 *
 * @ Created on 30/12/18 12:04
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Registration;

use Twig\Environment;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\DDD\Infrastructure\User\Form\RegistrationType;
use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\DDD\Infrastructure\Service\MessageBag\OnSuccessRegistration;
use App\DDD\Security\User\ValueObject\Interfaces\EmailAlreadyExistInterface;
use App\DDD\Application\UseCase\Command\User\RegistrationCommand;
use App\DDD\UserInterface\WEB\Action\User\Registration\Interfaces\RegistrationActionInterface;

/**
 * Class RegistrationAction
 *
 * @package App\DDD\UserInterface\WEB\Action\User\Registration
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 * @Route({"en": "/registration", "fr": "/inscription"}, name="security_registration", methods={"GET", "POST"})
 */
final class RegistrationAction implements RegistrationActionInterface
{
	/**
	 * @var EmailAlreadyExistInterface
	 */
	private $emailAlreadyExist;

	/**
	 * @var Environment $twig
	 */
	private $twig;

	/**
	 * @var FormFactoryInterface $formFactory
	 */
	private $formFactory;

	/**
	 * @var MessageBusInterface $bus
	 */
	private $bus;

	/**
	 * @var UrlGeneratorInterface $urlGenerator
	 */
	private $urlGenerator;

	/**
	 * @var Security $security
	 */
	private $security;

	/**
	 * RegistrationAction constructor.
	 *
	 * @param EmailAlreadyExistInterface $emailAlreadyExist
	 * @param Environment                $twig
	 * @param FormFactoryInterface       $formFactory
	 * @param MessageBusInterface        $bus
	 * @param UrlGeneratorInterface      $urlGenerator
	 * @param Security                   $security
	 */
	public function __construct(
		EmailAlreadyExistInterface $emailAlreadyExist,
		Environment $twig,
		FormFactoryInterface $formFactory,
		MessageBusInterface $bus,
		UrlGeneratorInterface $urlGenerator,
		Security $security
	) {
		$this->emailAlreadyExist = $emailAlreadyExist;
		$this->twig = $twig;
		$this->formFactory = $formFactory;
		$this->bus = $bus;
		$this->urlGenerator = $urlGenerator;
		$this->security = $security;
	}

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request)
	{
		if($this->security->isGranted('IS_AUTHENTICATED_FULLY')) {
			return new RedirectResponse(
				$this->urlGenerator->generate(
					'home',
					[
						'_locale' => $request->getLocale()
					]
				)
			);
		}

		$registrationForm = $this->formFactory->create(RegistrationType::class, null);

		$registrationForm->handleRequest($request);

		if($registrationForm->isSubmitted() && $registrationForm->isValid()) {

			$registrationCommand = new RegistrationCommand($registrationForm->getData());

			try {
				$this->emailAlreadyExist->__invoke($registrationCommand->getEmail());
				$this->bus->dispatch($registrationCommand);
				$this->bus->dispatch(new OnSuccessRegistration());
				return new RedirectResponse(
					$this->urlGenerator->generate(
						'security_login',
						[
							'_locale' => $request->getLocale()
						]
					)
				);
			} catch (EmailAlreadyExistException $exception) {
				$registrationForm->get('email')->addError(new FormError($exception->getMessage()));
			}
		}

		return new Response(
			$this->twig->render(
				"User/Registration/registration.html.twig",
				[
					'registrationForm' => $registrationForm->createView()
				]
			)
		);
	}
}