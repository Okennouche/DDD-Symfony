<?php

declare(strict_types=1);

/**
 *
 * @ Created on 16/01/19 20:45
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Infrastructure\Service\Notifier\Mailer\Interfaces;

use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Interface MailerInterface
 *
 * @package App\DDD\Infrastructure\Service\Notifier\Mailer\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface MailerInterface
{
	/**
	 * @param UserInterface $user
	 *
	 * @return mixed
	 */
	public function sendConfirmationEmailMessage(UserInterface $user);
}