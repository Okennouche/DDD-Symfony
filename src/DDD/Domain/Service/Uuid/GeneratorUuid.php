<?php

declare(strict_types=1);

/**
 *
 * @ Created on 29/12/18 10:05
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Domain\Service\Uuid;

use Ramsey\Uuid\Uuid as UuidRamsey;
use App\DDD\Domain\Service\Uuid\Interfaces\GeneratorUuidInterface;

/**
 * Class GeneratorUuid
 *
 * @package App\DDD\Domain\Service\Uuid
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
class GeneratorUuid implements GeneratorUuidInterface
{
	/**
	 * @inheritdoc
	 */
	public static function uuid(): string
	{
		return UuidRamsey::uuid4()->toString();
	}
}