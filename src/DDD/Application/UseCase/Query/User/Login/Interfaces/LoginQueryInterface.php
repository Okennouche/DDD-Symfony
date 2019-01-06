<?php

declare(strict_types=1);

/**
 *
 * @ created on 05/01/19 22:22
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Login\Interfaces;


/**
 * class LoginQueryInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface LoginQueryInterface
{
	/**
	 * @return string
	 */
	public function getEmail(): string;

	/**
	 * @return string
	 */
	public function getPlainPassword(): string;
}