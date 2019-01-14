<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 14:12
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Aggregate\Interfaces;

/**
 * Interface AggregateIdInterface
 *
 * @package App\DDD\Shared\Aggregate\Interfaces
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
interface AggregateIdInterface
{
	/**
	 * @param string $uuid
	 *
	 * @return mixed
	 */
	public static function fromString(string $uuid);

	/**
	 * @return string
	 */
	public function __toString(): string;

	/**
	 * @param AggregateIdInterface $uuid
	 *
	 * @return mixed
	 */
	public function equals(AggregateIdInterface $uuid);
}