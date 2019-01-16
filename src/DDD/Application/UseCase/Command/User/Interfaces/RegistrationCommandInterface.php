<?php

declare(strict_types=1);

/**
 *
 * @ Created on 28/12/18 05:18
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Command\User\Interfaces;

use App\DDD\Shared\Uuid\Uuid;

/**
 * Interface RegistrationCommandInterface
 *
 * @package App\DDD\Application\UseCase\Command\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface RegistrationCommandInterface
{
	/**
	 * RegistrationCommandInterface constructor.
	 *
	 * @param array $dataForms
	 */
	public function __construct(array $dataForms);

	/**
	 * @return Uuid
	 */
	public function getUuid(): Uuid;

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

	/**
	 * @return string
	 */
	public function getToken():string;
}