<?php

declare(strict_types=1);

/**
 *
 * @ Created on 12/01/19 17:30
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Application\UseCase\Query\User\Interfaces;


/**
 * Interface FindByEmailQueryInterface
 *
 * @package App\DDD\Application\UseCase\Query\User\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface FindByEmailQueryInterface
{
	/**
	 * @return string
	 */
	public function getEmail(): string;
}