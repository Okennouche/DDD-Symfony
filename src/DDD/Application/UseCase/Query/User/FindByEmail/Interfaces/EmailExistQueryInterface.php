<?php

declare(strict_types=1);

/**
 *
 * @ Created on 10/01/2019 15:36
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\FindByEmail\Interfaces;

/**
 * Interface EmailExistQueryInterface
 *
 * @package App\DDD\Application\UseCase\Query\User\FindByEmail\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface EmailExistQueryInterface
{
	/**
	 * @return string
	 */
	public function getEmail(): string;
}