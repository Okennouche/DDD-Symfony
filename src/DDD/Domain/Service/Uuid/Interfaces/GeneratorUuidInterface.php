<?php

declare(strict_types=1);

/**
 *
 * @ Created on 29/12/18 10:06
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Service\Uuid\Interfaces;


/**
 * Interface GeneratorUuidInterface
 *
 * @package App\DDD\Domain\Service\Uuid\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface GeneratorUuidInterface
{
	/**
	 * @return string
	 */
	public static function uuid(): string;
}