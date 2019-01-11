<?php

declare(strict_types=1);

/**
 *
 * @ Created on 10/01/19 23:28
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Security\User\Checker;

use App\DDD\Domain\Entity\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use App\DDD\Domain\Exception\User\AccountIsActiveException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;

/**
 * Class UserChecker
 *
 * @package App\DDD\Security\User\Checker
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserChecker implements UserCheckerInterface
{
	/**
	 * @inheritdoc
	 */
	public function checkPreAuth(UserInterface $user)
	{
		if (!$user instanceof User) {
			return;
		}
	}

	/**
	 * C@inheritdoc
	 */
	public function checkPostAuth(UserInterface $user)
	{
		if (!$user instanceof User) {
			return;
		}

		if (!$user->isActive()) {
			throw new AccountIsActiveException('account_is_not_activated');
		}
	}
}