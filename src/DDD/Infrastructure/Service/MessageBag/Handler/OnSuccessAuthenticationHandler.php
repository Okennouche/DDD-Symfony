<?php

declare(strict_types=1);

/**
 *
 * @ Created on 13/01/19 10:45
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\Service\MessageBag\Handler;

use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use App\DDD\Infrastructure\Service\MessageBag\OnSuccessAuthentication;
use App\DDD\Infrastructure\Service\MessageBag\Handler\Interfaces\OnSuccessAuthenticationHandlerInterface;

/**
 * Class OnSuccessAuthenticationHandler
 *
 * @package App\DDD\Infrastructure\Service\MessageBag\Handler
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class OnSuccessAuthenticationHandler implements OnSuccessAuthenticationHandlerInterface
{

	const ON_SUCCESS = 'success';

	/**
	 * @var FlashBagInterface
	 */
	private $flashBag;
	/**
	 * @var TranslatorInterface
	 */
	private $translator;

	/**
	 * @inheritdoc
	 */
	public function __construct(
		FlashBagInterface $flashBag,
		TranslatorInterface $translator
	) {
		$this->flashBag = $flashBag;
		$this->translator = $translator;
	}

	/**
	 * @inheritdoc
	 */
	public function __invoke(OnSuccessAuthentication $command): void
	{
		$message = $this->translator->trans(
			'message_welcome_user %username%',
			[
				'%username%' => $command->getUsername()
			]
		);

		$this->flashBag->add(
			self::ON_SUCCESS,
			$message
		);
	}
}