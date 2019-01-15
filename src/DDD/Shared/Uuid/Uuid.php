<?php

declare(strict_types=1);

/**
 *
 * @ Created on 14/01/2019 14:17
 * @ This file is part of the DDD project.
 * @ Contact (c) Omar Kennouche <dev.kennouche@gmail.com>
 * @ Licence For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace App\DDD\Shared\Uuid;

use App\DDD\Domain\Service\Uuid\GeneratorUuid;
use App\DDD\Shared\Aggregate\Interfaces\AggregateIdInterface;

/**
 * Class Uuid
 *
 * @package App\DDD\Shared\Uuid
 *
 * @author Omar Kennouche <dev.kennouche@gmail.com>
 */
final class Uuid implements AggregateIdInterface
{
	/**
	 * @var string $uuid
	 */
	private $uuid;

	/**
	 * Uuid constructor.
	 *
	 * @param string $uuid
	 */
	public function __construct(string $uuid)
	{
		$this->uuid = $uuid;
	}

	/**
	 * @return Uuid
	 */
	public static function generate(): Uuid
	{
		return new Uuid(GeneratorUuid::uuid());
	}

	/**
	 * @inheritdoc
	 */
	public static function fromString(string $uuid): Uuid
	{
		return new Uuid($uuid);
	}

	/**
	 * @inheritdoc
	 */
	public function __toString(): string
	{
		return (string) $this->uuid;
	}

	/**
	 * @inheritdoc
	 */
	public function equals(AggregateIdInterface $uuid)
	{
		return $uuid instanceof Uuid && $uuid->uuid === $this->uuid;
	}
}