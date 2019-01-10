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

use Symfony\Component\Form\Form;
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
use App\DDD\Application\UseCase\Query\User\FindByEmail\EmailExistQuery;
use App\DDD\UserInterface\WEB\Action\User\Registration\Interfaces\RegistrationActionInterface;

/**
 * Class RegistrationAction
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 * @Route({"en": "/registration", "fr": "/inscription"}, name="security_registration", methods={"GET", "POST"})
 */
class RegistrationAction implements RegistrationActionInterface
{
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
	 * @param Environment           $twig
	 * @param FormFactoryInterface  $formFactory
	 * @param MessageBusInterface   $bus
	 * @param UrlGeneratorInterface $urlGenerator
	 */
	public function __construct(
		Environment $twig,
		FormFactoryInterface $formFactory,
		MessageBusInterface $bus,
		UrlGeneratorInterface $urlGenerator
	) {
		$this->twig = $twig;
		$this->formFactory = $formFactory;
		$this->bus = $bus;
		$this->urlGenerator = $urlGenerator;
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

			$registrationCommand = $form->getData();

			try {
				$this->bus->dispatch(new EmailExistQuery($registrationCommand->getEmail()));
				$this->bus->dispatch($registrationCommand);
				return new RedirectResponse($this->urlGenerator->generate('security_login'));
			} catch (EmailAlreadyExistException $exception) {
				dump($exception->getMessage());
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