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

namespace App\DDD\Infrastructure\Service\MessageBag;

use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use App\DDD\Infrastructure\Service\MessageBag\Interfaces\OnRegistrationSuccessInterface;


/**
 * Class OnRegistrationSuccess
 *
 * @package App\DDD\Infrastructure\Service\MessageBag
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class OnRegistrationSuccess implements OnRegistrationSuccessInterface
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
	public function __invoke(): void
	{
		$message = $this->translator->trans('message_registration_success_user');

		$this->flashBag->add(
			self::ON_SUCCESS,
			$message
		);
	}
}