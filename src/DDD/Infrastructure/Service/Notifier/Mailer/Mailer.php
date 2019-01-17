<?php

declare(strict_types=1);

/**
 *
 * @ Created on 16/01/19 20:41
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\Service\Notifier\Mailer;

use App\DDD\Shared\Token\Token;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\DDD\Infrastructure\Service\Notifier\Mailer\Interfaces\MailerInterface;

/**
 * Class Mailer
 *
 * @package App\DDD\Infrastructure\Service\Notifier\Mailer
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class Mailer implements MailerInterface
{
	/**
	 * @var \Swift_Mailer
	 */
	protected $mailer;

	/**
	 * @var UrlGeneratorInterface
	 */
	protected $router;

	/**
	 * @var EngineInterface
	 */
	protected $templating;

	/**
	 * @var array
	 */
	protected $parameters;

	/**
	 * Mailer constructor.
	 *
	 * @param \Swift_Mailer         $mailer
	 * @param UrlGeneratorInterface $router
	 * @param EngineInterface       $templating
	 * @param array                 $parameters
	 */
	public function __construct(\Swift_Mailer $mailer, UrlGeneratorInterface  $router, EngineInterface $templating, array $parameters)
	{
		$this->mailer = $mailer;
		$this->router = $router;
		$this->templating = $templating;
		$this->parameters = $parameters;
	}

	/**
	 * {@inheritdoc}
	 */
	public function sendConfirmationEmailMessage(UserInterface $user)
	{
		$url = $this->router->generate(
			'confirm_registration',
			[
				'token' => Token::generate()
			],
			UrlGeneratorInterface::ABSOLUTE_URL
		);
	}

	/**
	 * @inheritdoc
	 */
	protected function sendEmailMessage($renderedTemplate, $fromEmail, $toEmail)
	{
		$renderedLines = explode("\n", trim($renderedTemplate));
		$subject = array_shift($renderedLines);
		$body = implode("\n", $renderedLines);
		$message = (new \Swift_Message())->setSubject($subject)
										 ->setFrom($fromEmail)
										 ->setTo($toEmail)
										 ->setBody($body);

		$this->mailer->send($message);
	}
}
