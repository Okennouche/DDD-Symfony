<?php

declare(strict_types=1);

/**
 *
 * @ created on 30/12/18 12:04
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\UserInterface\WEB\Action\User\Registration;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use App\DDD\Infrastructure\User\Form\RegistrationType;
use App\DDD\UserInterface\WEB\Action\User\Registration\Interfaces\RegistrationActionInterface;


/**
 * class RegistrationAction
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 * @Route("/registration", name="security_registration")
 *
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
			$this->bus->dispatch($form->getData());
			return new RedirectResponse($this->urlGenerator->generate('security_login'));
		}

		return new Response(
			$this->twig->render(
				"User/Registration/registration.html.twig",
				[
					'form' => $form->createView()
				]
			)
		);
	}
}