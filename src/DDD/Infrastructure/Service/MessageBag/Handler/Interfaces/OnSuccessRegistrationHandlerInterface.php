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

namespace App\DDD\Infrastructure\Service\MessageBag\Handler\Interfaces;

use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DDD\Infrastructure\Service\MessageBag\OnSuccessRegistration;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

/**
 * Interface OnSuccessRegistrationHandlerInterface
 *
 * @package App\DDD\Infrastructure\Service\MessageBag\Handler\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface OnSuccessRegistrationHandlerInterface extends MessageHandlerInterface
{
	/**
	 * OnSuccessRegistrationHandlerInterface constructor.
	 *
	 * @param FlashBagInterface   $flashBag
	 * @param TranslatorInterface $translator
	 */
	public function __construct(FlashBagInterface $flashBag, TranslatorInterface $translator);

	/**
	 * @param OnSuccessRegistration $command
	 */
	public function __invoke(OnSuccessRegistration $command): void;
}