<?php

declare(strict_types=1);

/**
 *
 * @ created on 29/12/18 10:06
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <o.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Service\Uuid\Interfaces;


/**
 * class UuidInterface
 *
 * @author Omar Kennouche <o.kennouche@gmail.com>
 */
interface UuidInterface
{
	/**
	 * @return string
	 */
	public static function uuid(): string;
}