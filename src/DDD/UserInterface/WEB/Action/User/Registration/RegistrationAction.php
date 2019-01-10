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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\DDD\Infrastructure\User\Form\RegistrationType;
use App\DDD\Domain\Exception\User\EmailAlreadyExistException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\DDD\Security\User\ValueObject\Interfaces\EmailAlreadyExistInterface;
use App\DDD\Application\UseCase\Command\User\Registration\RegistrationCommand;
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
	 * @var UrlGeneratorInterface
	 */
	private $urlGenerator;

	/**
	 * RegistrationAction constructor.
	 *
	 * @param EmailAlreadyExistInterface $emailAlreadyExist
	 * @param Environment                $twig
	 * @param FormFactoryInterface       $formFactory
	 * @param MessageBusInterface        $bus
	 * @param UrlGeneratorInterface      $urlGenerator
	 */
	public function __construct(
		EmailAlreadyExistInterface $emailAlreadyExist,
		Environment $twig,
		FormFactoryInterface $formFactory,
		MessageBusInterface $bus,
		UrlGeneratorInterface $urlGenerator
	) {
		$this->twig = $twig;
		$this->formFactory = $formFactory;
		$this->bus = $bus;
		$this->urlGenerator = $urlGenerator;
		$this->emailAlreadyExist = $emailAlreadyExist;
	}

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request)
	{
		$form = $this->formFactory->create(RegistrationType::class, null);

		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {

			$registrationCommand = new RegistrationCommand($form->getData());

			try {
				$this->emailAlreadyExist->__invoke($registrationCommand->getEmail());
				$this->bus->dispatch($registrationCommand);
				return new RedirectResponse($this->urlGenerator->generate('security_login'));
			} catch (EmailAlreadyExistException $exception) {
				$form->get('email')->addError(new FormError($exception->getMessage()));
			}
		}

		return new Response(
			$this->twig->render(
				"User/Registration/registration.html.twig",
				[
					'form' => $form->createView(),
					'error'=> ''
				]
			)
		);
	}
}