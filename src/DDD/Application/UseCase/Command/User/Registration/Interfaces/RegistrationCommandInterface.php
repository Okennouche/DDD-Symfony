<?php

declare(strict_types=1);

/**
 *
 * @ created on 28/12/18 05:18
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Registration\Interfaces;

/**
 * Interface RegistrationCommandInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface RegistrationCommandInterface
{
	/**
	 * @return string
	 */
	public function getUuid(): string;

	/**
	 * @return string
	 */
	public function getUsername(): string;

	/**
	 * @return string
	 */
	public function getEmail(): string;

	/**
	 * @return string
	 */
	public function getPassword(): string;
}