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

namespace App\DDD\Security\User\Cheker;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccountStatusException;


/**
 * Class UserChecker
 *
 * @package App\DDD\Security\User\Cheker
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class UserChecker implements UserCheckerInterface
{

	/**
	 * Checks the user account before authentication.
	 *
	 * @throws AccountStatusException
	 */
	public function checkPreAuth(UserInterface $user)
	{
		// TODO: Implement checkPreAuth() method.
	}

	/**
	 * Checks the user account after authentication.
	 *
	 * @throws AccountStatusException
	 */
	public function checkPostAuth(UserInterface $user)
	{
		// TODO: Implement checkPostAuth() method.
	}
}